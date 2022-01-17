<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class DepartmentModal extends ModalComponent
{
    public $name;
    public $code;
    public $department;

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
    ];

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($department = null)
    {
        if($department)
        {
            $this->department = Department::find($department);
            $this->name = $this->department['name'];
            $this->code = $this->department['code'];
        }
    }

    public function store()
    {
        $data = $this->validate();

        if($this->department)
        {
            $this->department->update($data);
        }
        else
        {
            Department::create($data);
        }

        $this->closeModalWithEvents([
            'updateDepartments'
        ]);
    }

    public function render()
    {
        return view('livewire.department.department-modal');
    }
}
