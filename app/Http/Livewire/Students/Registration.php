<?php

namespace App\Http\Livewire\Students;

use App\Models\Major;
use App\Models\Course;
use App\Models\Office;
use Livewire\Component;
use App\Models\Department;
use App\Models\Settings;
use App\Models\Student;
use App\Models\User;
use App\Services\StudentService;
use DB;

class Registration extends Component
{
    public $student;

    public $student_status;
    public $student_id;
    public $course_program;
    public $selected_course;
    public $selected_major;
    public $current_year;
    public $previous_school;
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
    public $year1;
    public $year2;
    public $term;

    public $settings;

    public $terms = [
        1 => 'First Semester',
        2 => 'Second Semester',
        3 => 'Summer'
     ];

    protected $rules = [
        'student_status' =>'required',
        'student_id' => 'required_if:student_status,old',
        'course_program' => 'nullable',
        'selected_course' => 'required',
        'selected_major' => 'nullable',
        'year1' => 'required',
        'year2' => 'required',
        'term' => 'required',
        'current_year' => 'required',
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'name_ext' => 'nullable',
    ];

    public function mount($studentId = null)
    {
        $this->page = 1;
        $this->settings = Settings::first();
        if($studentId)
        {
            $this->student = Student::find($studentId);

            $this->student_status = $this->student->student_status;
            $this->student_id = $this->student->student_id;
            $this->course_program = $this->student->course_program;
            $this->selected_course = $this->student->course_id;
            $this->selected_major = $this->student->major_id;
            $this->current_year = $this->student->current_year;
            $this->previous_school = $this->student->previous_school;

            $this->first_name = $this->student->first_name;
            $this->last_name = $this->student->last_name;
            $this->middle_name = $this->student->middle_name;
            $this->name_ext = $this->student->name_ext;

            $this->dob = $this->student->informable->dob;
            $this->pob = $this->student->informable->pob;
            $this->gender = $this->student->informable->gender;
            $this->h_street = $this->student->informable->h_street;
            $this->h_city = $this->student->informable->h_city;
            $this->h_state = $this->student->informable->h_state;
            $this->h_zip = $this->student->informable->h_zip;
            $this->p_street = $this->student->informable->p_street;
            $this->p_city = $this->student->informable->p_city;
            $this->p_state = $this->student->informable->p_state;
            $this->p_zip = $this->student->informable->p_zip;
            $this->phone_number = $this->student->informable->phone_number;
            $this->personal_email = $this->student->informable->personal_email;
            $this->guardian_name = $this->student->informable->guardian_name;
            $this->g_contact = $this->student->informable->g_contact;
            $this->g_relationship = $this->student->informable->g_relationship;
        }
        else
        {
            $this->student_status = 'new';
            $this->current_year = 1;
        }

        $this->year1 = $this->settings->school_year[0];
        $this->year2 = $this->settings->school_year[1];
        $this->term = $this->settings->term;
    }

    public function setPage($value)
    {
        if($this->student_status == "old")
        {
            $this->student = Student::whereStudentId($this->student_id)->first();


            if(!$this->student)
            {
                $this->addError('no_student', 'Student ID is not found in the database!');
                return;
            }
            else
            {
                $this->student_status = $this->student->student_status;
                $this->student_id = $this->student->student_id;
                $this->course_program = $this->student->course_program;
                $this->selected_course = $this->student->course_id;
                $this->selected_major = $this->student->major_id;
                $this->current_year = $this->student->current_year;
                $this->previous_school = $this->student->previous_school;

                $this->first_name = $this->student->first_name;
                $this->last_name = $this->student->last_name;
                $this->middle_name = $this->student->middle_name;
                $this->name_ext = $this->student->name_ext;

                $this->dob = $this->student->informable->dob;
                $this->pob = $this->student->informable->pob;
                $this->gender = $this->student->informable->gender;
                $this->h_street = $this->student->informable->h_street;
                $this->h_city = $this->student->informable->h_city;
                $this->h_state = $this->student->informable->h_state;
                $this->h_zip = $this->student->informable->h_zip;
                $this->p_street = $this->student->informable->p_street;
                $this->p_city = $this->student->informable->p_city;
                $this->p_state = $this->student->informable->p_state;
                $this->p_zip = $this->student->informable->p_zip;
                $this->phone_number = $this->student->informable->phone_number;
                $this->personal_email = $this->student->informable->personal_email;
                $this->guardian_name = $this->student->informable->guardian_name;
                $this->g_contact = $this->student->informable->g_contact;
                $this->g_relationship = $this->student->informable->g_relationship;
            }

        }

        $this->page = $value;
    }


    public function store()
    {

        $this->validate();

        DB::transaction(function () {
            if($this->student)
            {
                $this->student->update([
                    'course_id' => $this->selected_course,
                    'major_id' => $this->selected_major ?? null,
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'name_ext' => $this->name_ext,
                    'student_status' => $this->student_status,
                    'student_id' => $this->student_id,
                    'course_program' => $this->course_program,
                    'current_year' => $this->current_year,
                    'school_year' => $this->year1 ."-".$this->year2,
                    'term' => $this->term,
                    'enrollment_status' => 'admitted'
                ]);

                $this->student->informable()->update([
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
                $student = Student::create([
                    'course_id' => $this->selected_course,
                    'major_id' => $this->selected_major ?? null,
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'name_ext' => $this->name_ext,
                    'student_status' => $this->student_status,
                    'temp_id' => resolve(StudentService::class)->getTempId(),
                    'course_program' => $this->course_program,
                    'current_year' => $this->current_year,
                    'school_year' => $this->year1 ."-".$this->year2,
                    'term' => $this->term,
                ]);

                $student->informable()->create([
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


            return redirect()->route('students.lists');
        });

    }

    public function render()
    {
        $majors = [];

        if($this->selected_course != '')
        {
            $majors = Major::when($this->selected_course != '', function($query){
                $query->where('course_id' , $this->selected_course);
            })->orderBy('name')->get();
        }

        return view('livewire.students.registration', [
            'colleges' => Department::orderBy('name')->get(),
            'courses' => Course::orderBy('name')->get(),
            'offices' => Office::orderBy('name')->get(),
            'majors' => $majors,
        ]);
    }
}
