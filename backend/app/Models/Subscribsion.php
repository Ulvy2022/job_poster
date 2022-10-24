<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribsion extends Model
{
    use HasFactory;
    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'price',
        'features',
        'description',
        'plane_type'
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
