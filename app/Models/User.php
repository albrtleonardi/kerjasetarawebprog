<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        // 'NamaLengkap',
        'UserName',
        'Email',
        'Password',
        'PhoneNumber', 
        'Address', 
        'Country', 
        'Province', 
        'City', 
        'DOB', 
        'Gender', 
        'Description',
        'SkillName',
        'profile_photo',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
