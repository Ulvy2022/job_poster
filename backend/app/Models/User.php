<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class User extends Model
{
    use HasApiTokens, HasFactory;
    public function Subscribsion()
    {
        return $this->hasMany(Subscription::class);
    }

    public function Jobsposter()
    {
        return $this->hasMany(JobsPoster::class);
    }

    protected $fillable=[
        'firstName', 
        'lastName', 
        'gender', 
        'role',
        'phoneNumber', 
        'email', 
        'password'
    ];
}
