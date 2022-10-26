<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;

    public function subscribsion()
    {
        return $this->hasMany(Subscribe::class);
    }

  

    protected $casts = [
        'features' => 'array',
    ];
}
