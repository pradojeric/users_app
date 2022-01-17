<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Department;
use App\Models\Major;
use LivewireUI\Modal\ModalComponent;

class CourseModal extends ModalComponent
{
    public $name;
    public $code;
    public $department_id;
    public $majors = [];
    public $course = '';

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
        'department_id' => 'required',
        'majors' => 'array'
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($course = null)
    {
        if($course)
        {
            $this->course = Course::find($course);
            $this->department_id = $this->course->department_id;
            $this->name = $this->course->name;
            $this->code = $this->course->code;
            $this->majors = collect($this->course->majors)->each(function($major){
                return [
                    'id' => $major->id,
                    'name' => $major->name
                ];
            })->toArray();

        }
    }

    public function addMajor()
    {
        $this->majors[] = [];
    }

    public function deleteMajor($index)
    {
        if(isset($this->majors[$index]['id']))
        {
            Major::find($this->majors[$index]['id'])->delete();
        }

        unset($this->majors[$index]);
        $this->majors = array_values($this->majors);
    }

    public function store()
    {
        $data = $this->validate();

        if($this->course)
        {
            $this->course->update($data);
            foreach($this->majors as $major)
            {
                if(isset($major['id'])){
                    Major::find($major['id'])->update([
                        'name' => $major['name'],
                    ]);
                }
                else
                {
                    $this->course->majors()->create($major);
                }
            }
        }
        else
        {
            $course = Course::create($data);

            $course->majors()->createMany($this->majors);
        }

        $this->closeModalWithEvents([
            'updateCourses'
        ]);
    }

    public function render()
    {
        return view('livewire.course.course-modal', [
            'departments' => Department::orderBy('name')->get(),
        ]);
    }
}
