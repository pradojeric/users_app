<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{

    protected $listeners = [
        'updateCourses' => '$refresh'
    ];

    public function deleteCourse(Course $course)
    {
        $course->delete();
    }

    public function render()
    {
        return view('livewire.course.course-index', [
            'courses' => Course::orderBy('name')->get(),
        ]);
    }
}
