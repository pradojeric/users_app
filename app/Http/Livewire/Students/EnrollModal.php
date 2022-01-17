<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use App\Models\User;
use DB;
use Hash;
use LivewireUI\Modal\ModalComponent;

class EnrollModal extends ModalComponent
{
    public $student;
    public $studentId;
    public $enrollmentStatus;

    public $user;
    public $email;

    protected $rules = [
        'studentId' => 'required',
        'enrollmentStatus' => 'required',
        'user' => 'required',
        'email' => 'required|email',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($studId)
    {
        $this->student = Student::find($studId);
        $this->studentId = $this->student->stud_id;
        $this->enrollmentStatus = $this->student->enrollment_status;
        $this->user = $this->student->user->name;
        $this->email = $this->student->user->email;
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function(){
            if($this->student->user->id)
            {
                $this->student->user->update([
                    'name' => $this->user,
                    'email' => $this->email,
                ]);
            }
            else
            {
                $user = User::create([
                    'name' => $this->user,
                    'email' => $this->email,
                    'password' => Hash::make('colegio2021'),
                ]);

                $user->assignRole('student');

                $this->student->user()->associate($user);
            }

            $this->student->student_id = $this->studentId;
            $this->student->enrollment_status = $this->enrollmentStatus;
            $this->student->save();
        });

        $this->closeModalWithEvents([
            'updateStudents'
        ]);
    }

    public function render()
    {
        return view('livewire.students.enroll-modal');
    }
}
