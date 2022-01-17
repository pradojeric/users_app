<?php

namespace App\Http\Livewire\Staff;

use App\Models\Employee;
use Livewire\Component;

class StaffIndex extends Component
{
    protected $listeners = [
        'updateEmployee' => '$refresh',
    ];

    public function delete(Employee $staff)
    {
        dd("Not yet");
    }

    public function render()
    {
        return view('livewire.staff.staff-index', [
            'staffs' => Employee::orderBy('last_name')->get(),
        ]);
    }
}
