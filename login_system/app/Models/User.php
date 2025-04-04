<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// quản lý dữ liệu database
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 
        'email',
        'password',
    ];
}

