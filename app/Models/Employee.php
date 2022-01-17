<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'doe', 'eoc', 'empPosition',
        'first_name', 'middle_name', 'last_name', 'name_ext',
        'empTenureship', 'college_id', 'office_id', 'user_id'
    ];

    public function getEmployeeNameAttribute()
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

    public function college()
    {
        return $this->belongsTo(Department::class, 'college_id')->withDefault([
            'name' => 'N/A',
        ]);
    }

    public function office()
    {
        return $this->belongsTo(Office::class)->withDefault([
            'name' => 'All',
        ]);
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'empPosition');
    }

    public function tenureship()
    {
        return $this->belongsTo(Tenureship::class, 'empTenureship')->withDefault([
            'name' => '-'
        ]);
    }

    public function informable()
    {
        return $this->morphOne(Information::class, 'informable');
    }
}
