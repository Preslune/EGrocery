<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(orders::class, 'items_id', 'items_id');
    }
}
