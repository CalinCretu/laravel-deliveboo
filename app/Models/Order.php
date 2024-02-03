<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
