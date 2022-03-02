<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;

class StepController extends Controller
{
    //
    public function getStudents(Request $request)
    {
        // return new StudentCollection(Student::all());

        return StudentResource::collection(
            Student::with(['course', 'major', 'user'])
                ->when($request->get('school_year') && $request->get('term'), function($query) use ($request){
                    $query->where('school_year', $request->school_year)
                        ->where('term', $request->term);
                })
                ->get()
        );
    }

    public function getFaculties(Request $request)
    {
        // return new EmployeeCollection(Employee::all());
        return EmployeeResource::collection(Employee::with(['user', 'college', 'office', 'position'])->get());
    }
}
