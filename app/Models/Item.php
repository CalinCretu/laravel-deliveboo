<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'item_img',
        'description',
        'is_vegan',
        'is_gluten_free',
        'is_spicy',
        'is_visible'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
