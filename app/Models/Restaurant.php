<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    const SORT = [
        'front-n' => 'A-Z',
        'back-n' => 'Z-A',
    ];
    const PER_PAGE = [
        'all', 5, 12, 21, 34
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function dishes()
    {
        return $this->hasMany(Dish::class, 'restaurants_id', 'id');
    }
}
