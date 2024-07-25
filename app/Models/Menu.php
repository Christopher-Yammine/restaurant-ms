<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ["restaurant_id", "category"];
    public function restaurant()
    {
        $this->belongsTo(Restaurant::class);
    }
}
