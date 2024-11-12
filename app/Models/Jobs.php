<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'job';

    protected $fillable = [
        'JobID',
        'CompanyID',
        'Role',
        'JobType',
        'RemoteOrOnsite',
        'CareerLevel',
        'JobDescription',
        'SuitableFor',
        'Requirements',
        'RequiredSkills',
        'SalaryMin',
        'SalaryMax',
    ];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class, 'CompanyID', 'CompanyID');
    }
}
