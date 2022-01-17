<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class DepartmentIndex extends Component
{
    protected $listeners = [
        'updateDepartments' => '$refresh'
    ];

    public function delete(Department $department)
    {
        $department->delete();
    }

    public function render()
    {
        return view('livewire.department.department-index', [
            'departments' => Department::orderBy('name')->get(),
        ]);
    }
}
