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
        $this->hasMany(Review::class);
    }
    public function hasMenus()
    {
        $this->hasMany(Menu::class);
    }
}
