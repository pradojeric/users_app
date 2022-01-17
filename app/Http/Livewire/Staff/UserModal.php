<?php

namespace App\Http\Livewire\Staff;

use App\Models\Employee;
use App\Models\User;
use DB;
use Hash;
use LivewireUI\Modal\ModalComponent;

class UserModal extends ModalComponent
{
    public $employee;

    public $user;
    public $email;

    protected $rules = [
        'user' => 'required',
        'email' => 'required|email',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($staffId)
    {
        $this->employee = Employee::find($staffId);
        $this->user = $this->employee->user->name;
        $this->email = $this->employee->user->email;

    }

    public function store()
    {
        $this->validate();

        DB::transaction(function(){
            if($this->employee->user->id)
            {
                $this->employee->user->update([
                    'name' => $this->user,
                    'email' => $this->email,
                ]);

            }else{
                $user = User::create([
                    'name' => $this->user,
                    'email' => $this->email,
                    'password' => Hash::make('colegio2021'),
                ]);

                $user->assignRole('employee');

                $this->employee->user()->associate($user);

                $this->employee->save();
            }
        });

        $this->closeModalWithEvents([
            'updateEmployee'
        ]);
    }

    public function render()
    {
        return view('livewire.staff.user-modal');
    }
}
