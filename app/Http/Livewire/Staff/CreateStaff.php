<?php

namespace App\Http\Livewire\Staff;

use App\Models\Office;
use Livewire\Component;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Tenureship;
use App\Services\StaffService;
use DB;

class CreateStaff extends Component
{
    public $existingStaff;

    public $empId;
    public $doe;
    public $eoc;
    public $empPos;
    public $empTenureship;
    public $selectedCollege;
    public $selectedOffice;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $name_ext;

    public $pob;
    public $dob;
    public $gender;
    public $h_street;
    public $h_city;
    public $h_state;
    public $h_zip;
    public $p_street;
    public $p_city;
    public $p_state;
    public $p_zip;
    public $phone_number;
    public $personal_email;
    public $guardian_name;
    public $g_contact;
    public $g_relationship;

    public $page;

    protected $rules = [
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'name_ext' => 'nullable',
        'doe' => 'required',
        'eoc' => 'required',
        'empPos' => 'required',
        'empTenureship' => 'nullable',
        'selectedCollege' => 'nullable',
        'selectedOffice' => 'nullable',
    ];

    public function mount($staffId = null)
    {
        $this->page = 1;

        if($staffId)
        {
            $this->existingStaff = Employee::find($staffId);
            $this->empId = $this->existingStaff->employee_id;
            $this->empPos = $this->existingStaff->empPosition;
            $this->empTenureship = $this->existingStaff->empTenureship;
            $this->selectedCollege = $this->existingStaff->college_id;
            $this->selectedOffice = $this->existingStaff->office_id;
            $this->doe = $this->existingStaff->doe;
            $this->eoc = $this->existingStaff->eoc;

            $this->first_name = $this->existingStaff->first_name;
            $this->last_name = $this->existingStaff->last_name;
            $this->middle_name = $this->existingStaff->middle_name;
            $this->name_ext = $this->existingStaff->name_ext;

            $this->dob = $this->existingStaff->informable->dob;
            $this->pob = $this->existingStaff->informable->pob;
            $this->gender = $this->existingStaff->informable->gender;
            $this->h_street = $this->existingStaff->informable->h_street;
            $this->h_city = $this->existingStaff->informable->h_city;
            $this->h_state = $this->existingStaff->informable->h_state;
            $this->h_zip = $this->existingStaff->informable->h_zip;
            $this->p_street = $this->existingStaff->informable->p_street;
            $this->p_city = $this->existingStaff->informable->p_city;
            $this->p_state = $this->existingStaff->informable->p_state;
            $this->p_zip = $this->existingStaff->informable->p_zip;
            $this->phone_number = $this->existingStaff->informable->phone_number;
            $this->personal_email = $this->existingStaff->informable->personal_email;
            $this->guardian_name = $this->existingStaff->informable->guardian_name;
            $this->g_contact = $this->existingStaff->informable->g_contact;
            $this->g_relationship = $this->existingStaff->informable->g_relationship;

        }

    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            if($this->existingStaff)
            {
                $this->existingStaff->update([
                    'employee_id' => $this->empId ?? resolve(StaffService::class)->getTempId(),
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'name_ext' => $this->name_ext,
                    'doe' => $this->doe != '' ? $this->doe : null,
                    'eoc' => $this->eoc != '' ? $this->eoc : null,
                    'empPosition' => $this->empPos,
                    'empTenureship' => $this->empTenureship,
                    'college_id' => $this->selectedCollege ?? null,
                    'office_id' => $this->selectedOffice ?? null,
                ]);

                $this->existingStaff->informable()->update([
                    'pob' => $this->pob,
                    'dob' => $this->dob,
                    'gender' => $this->gender,
                    'h_street' => $this->h_street,
                    'h_city' => $this->h_city,
                    'h_state' => $this->h_state,
                    'h_zip' => $this->h_zip,
                    'p_street' => $this->p_street,
                    'p_city' => $this->p_city,
                    'p_state' => $this->p_state,
                    'p_zip' => $this->p_zip,
                    'phone_number' => $this->phone_number,
                    'personal_email' => $this->personal_email,
                    'guardian_name' => $this->guardian_name,
                    'g_contact' => $this->g_contact,
                    'g_relationship' => $this->g_relationship,
                ]);
            }
            else
            {
                $staff = Employee::create([
                    'employee_id' => $this->empId ?? resolve(StaffService::class)->getTempId(),
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'name_ext' => $this->name_ext,
                    'doe' => $this->doe,
                    'eoc' => $this->eoc,
                    'empPosition' => $this->empPos,
                    'empTenureship' => $this->empTenureship,
                    'college_id' => $this->selectedCollege ?? null,
                    'office_id' => $this->selectedOffice ?? null,
                ]);

                $staff->informable()->create([
                    'pob' => $this->pob,
                    'dob' => $this->dob,
                    'gender' => $this->gender,
                    'h_street' => $this->h_street,
                    'h_city' => $this->h_city,
                    'h_state' => $this->h_state,
                    'h_zip' => $this->h_zip,
                    'p_street' => $this->p_street,
                    'p_city' => $this->p_city,
                    'p_state' => $this->p_state,
                    'p_zip' => $this->p_zip,
                    'phone_number' => $this->phone_number,
                    'personal_email' => $this->personal_email,
                    'guardian_name' => $this->guardian_name,
                    'g_contact' => $this->g_contact,
                    'g_relationship' => $this->g_relationship,
                ]);
            }


            return redirect()->route('staffs.lists');

        });
    }

    public function setPage($value)
    {
        $this->page = $value;
    }

    public function render()
    {
        return view('livewire.staff.create-staff', [
            'colleges' => Department::orderBy('name')->get(),
            'offices' => Office::orderBy('name')->get(),
            'positions' => Position::orderBy('name')->get(),
            'tenureships' => Tenureship::orderBy('name')->get(),
        ]);
    }
}
