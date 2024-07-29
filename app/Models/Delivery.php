<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number', 'restaurant_id'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
