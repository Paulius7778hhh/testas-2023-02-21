<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function dishes()
    {
        return $this->hasMany(Dish::class, 'restaurants_id', 'id');
    }
}
