<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    protected $fillable = [
        'student_code',
        'name',
        'email',
        'password',
        'class',
        'faculty',
        'gpa'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value) {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}