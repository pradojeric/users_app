<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'pob', 'dob', 'gender',
        'h_street', 'h_city', 'h_state', 'h_zip',
        'p_street', 'p_city', 'p_state', 'p_zip',
        'phone_number', 'personal_email',
        'guardian_name', 'g_contact', 'g_relationship',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
