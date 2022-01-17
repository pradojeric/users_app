<?php

namespace App\Http\Livewire\Students;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'oldPassword' => 'required|current_password',
        'newPassword' => 'required|same:confirmPassword',
    ];

    public function changePassword()
    {
        $this->validate();

        Auth::user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('success', 'Password changed successfully');

        return redirect()->route('students.dashboard');
    }

    public function render()
    {
        return view('livewire.students.change-password');
    }
}
