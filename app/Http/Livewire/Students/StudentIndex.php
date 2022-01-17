<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class StudentIndex extends Component
{
    public $show;

    public $school_year;
    public $term;

    protected $listeners = [
        'updateStudents' => '$refresh'
    ];

    protected $queryString = [
        'show' => ['except' => 'this_sem'],
    ];

    public function mount()
    {
        $settings = app('settings');
        // $settings = config('settings.config');
        $this->school_year = $settings->current_school_year;
        $this->term = $settings->term;

        $this->show = 'this_sem';
    }

    public function delete(Student $student)
    {
        dd("Not yet");
    }

    public function render()
    {

        $students = Student::with(['user'])->when($this->show === 'this_sem', function($query){
            $query->registered();
        })->latest()->get();


        return view('livewire.students.student-index', [
            'students' => $students,
        ]);
    }
}
