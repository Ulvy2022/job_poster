<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use LucasDotVin\Soulbscription\Models\Concerns\HasSubscriptions;


class User extends Model
{
    use HasApiTokens, HasFactory,HasSubscriptions;
    public function Subscribsion()
    {
        return $this->hasMany(Subscribe::class);
    }
    public function Jobsposter()
    {
        return $this->hasMany(JobsPoster::class);
    }

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function restorePost()
    {
        return $this->hasMany(restorePost::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    protected $fillable = [
        'fullName',
        'email',
        'password',
        'gender',
        'role',
    ];
    public $timestamps = false;

}
