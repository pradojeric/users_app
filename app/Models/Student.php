<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'course_id', 'major_id',
        'first_name', 'middle_name', 'last_name',
        'student_status', 'student_id', 'temp_id', 'enrollment_status',
        'course_program', 'current_year', 'school_year', 'term', 'previous_school'
    ];

    public function getStudIdAttribute()
    {
        if($this->attributes['student_id'])
            return $this->attributes['student_id'];
        return $this->attributes['temp_id']." (Temp)";
    }

    public function getStudentNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_name}";
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'No User Yet',
            'email' => 'No Email Yet',
        ]);
    }

    public function scopeRegistered($query)
    {
        $settings = app('settings');
        $school_year = $settings->getRawOriginal('school_year');
        // $school_year = config('settings.config')->getRawOriginal('school_year');
        $query->where('school_year', $school_year)
            ->where('term', $settings->term);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function informable()
    {
        return $this->morphOne(Information::class, 'informable');
    }
}
