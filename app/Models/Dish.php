<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\fileExists;

class Dish extends Model
{
    use HasFactory;
    protected $casts = [
        'rating' => 'array'
    ];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurants_id', 'id');
    }
    public function nopic()
    {
        $pic = $this->picture;
        if (fileExists(public_path() . $pic) !== null) {
            $this->save();
        }
        if (fileExists(public_path() . $pic)) {
            unlink(public_path() . $pic);
        }
        $this->picture = null;
        $this->save();
    }
}
