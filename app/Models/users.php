<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(orders::class, 'users_id');
    }

    public function roles()
    {
        return $this->belongsTo(roles::class);
    }

    public function genders()
    {
        return $this->belongsTo(genders::class, 'genders_id');
    }
}
