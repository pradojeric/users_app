<?php

namespace App\Imports;

use App\Models\Major;
use App\Models\Course;
use App\Models\Student;
use App\Models\Settings;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class StudentsImport implements ToModel, WithHeadingRow, WithBatchInserts, SkipsEmptyRows
{

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $course = Course::where('code', $row['course'])->first()->id;
        $major = Major::where('name', $row['major'])->first()->id;
        return new Student([
            'student_id' => $row['student_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'current_year' => $row['year'],
            'course_id' => $course,
            'major_id' => $major,
            'school_year' => Settings::getSettings()->school_year,
            'term' => Settings::getSettings()->term
        ]);
    }

    public function uniqueBy()
    {
        return 'student_id';
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules()
    {
        return [
            'student_id' => [
                'required',
            ]
        ];
    }
}
