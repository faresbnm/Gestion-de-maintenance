<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{

    public function student()
    {
        return $this->belongsTo(userData::class);
    }

    public function company()
    {
        return $this->belongsTo(companies::class, 'company_id');
    }
    use HasFactory;
}
