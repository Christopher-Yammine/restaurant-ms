<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "location"
    ];

    public function hasReviews()
    {
        return $this->hasMany(Review::class);
    }
    public function hasMenus()
    {
        return $this->hasMany(Menu::class);
    }
}
