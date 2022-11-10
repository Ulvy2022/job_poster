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
        return $this->hasMany(Subscribe::class);
    }
    public function Jobsposter()
    {
        return $this->hasMany(JobsPoster::class);
    }

    protected $fillable=[
        'fullName',
        'email',
        'password',
        'gender',
        'role',
    ];
    public $timestamps = false;

}
