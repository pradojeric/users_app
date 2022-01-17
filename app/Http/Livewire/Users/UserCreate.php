<?php

namespace App\Http\Livewire\Users;

use App\Models\Major;
use App\Models\Course;
use App\Models\Office;
use Livewire\Component;
use App\Models\Department;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $userTypes;
    public $userType;

    public $roles;
    public $page = 1;
    public $year1;
    public $year2;

    public $terms = [
        1 => 'First Semester',
        2 => 'Second Semester',
        3 => 'Summer'
     ];

    protected $queryString = [
        'userType' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    public function mount()
    {
        $this->roles = Role::all();
        $this->year1 = now()->format('Y');
        $this->year2 = (int)($this->year1) + 1;
    }

    public function setRole($role = null)
    {
        $this->userType = $role;
    }

    public function setPage($pageNumber)
    {
        $this->page = $pageNumber;
    }

    public function render()
    {
        return view('livewire.users.user-create');
    }
}
