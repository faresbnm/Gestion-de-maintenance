<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    public function student()
    {
        return $this->belongsTo(userData::class);
    }

    public function offer()
    {
        return $this->belongsTo(internships::class);
    }
    use HasFactory;
}
