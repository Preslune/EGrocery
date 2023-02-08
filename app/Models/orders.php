<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(users::class, 'orders_id');
    }

    public function items()
    {
        return $this->belongsTo(items::class);
    }
}
