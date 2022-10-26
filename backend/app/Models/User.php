<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class User extends Model
{
    use HasApiTokens, HasFactory;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscribsion()
    {
        return $this->hasMany(Subscribe::class);
    }

    public function jobsposter()
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
    public $timestamps = false;

}
