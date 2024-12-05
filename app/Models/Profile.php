<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'PhoneNumber',
        'Country',
        'Province',
        'City',
        'Address',
        'Gender',
        'DOB',
        'Description',
        'SkillName',
    ];

    protected $casts = [
        'DOB' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
