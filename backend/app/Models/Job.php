<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'job_title',
        'job_location',
        'job_type',
        'job_closedate',
        'company_name',
        'salary',
        'contact_name',
        'contact_email',
        'job_description',
    ];

    
}
