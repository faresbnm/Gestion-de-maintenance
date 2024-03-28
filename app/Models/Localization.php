<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    public function company()
    {
        return $this->belongsTo(companies::class);
    }
    use HasFactory;
}
