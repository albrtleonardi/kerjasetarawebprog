<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'CompanyName',
        'Address',
        'Industry',
        'EmployeeCount',
        'WorkTime',
        'DressCode',
        'CompanyDescription',
        'CompanyLink',
        'CompanyCity',
        'CompanyImage'
    ];


    public function jobs(): HasMany
    {
        return $this->hasMany(Jobs::class, 'CompanyID', 'CompanyID');
    }
    
}
