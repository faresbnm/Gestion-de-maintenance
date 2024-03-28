<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class companies extends Model
{

    public function internships()
    {
        return $this->hasMany(internships::class);
    }

    public function Localization()
    {
        return $this->hasMany(Localization::class);
    }

    public function rating()
    {
        return $this->hasOne(rating::class, 'company_id');
    }
    public function averageRating()
    {
        return DB::table('ratings')
            ->where('company_id', $this->id)
            ->avg('rating');
    }
    use HasFactory;
}
