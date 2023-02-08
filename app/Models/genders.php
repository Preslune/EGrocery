<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genders extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(users::class, 'genders_id','genders_id');
    }
}
