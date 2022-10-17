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
        return $this->hasMany(Subscription::class);
    }

    public function jobs()
    {
        return $this->hasMany(Subscription::class);
    }

    

    protected $fillable=['firstName', 'lastName', 'gender', 'role','phoneNumber', 'email', 'password'];
}
