<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function offer()
    {
        return $this->belongsTo(internships::class);
    }
    use HasFactory;
}
