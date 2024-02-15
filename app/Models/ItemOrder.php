<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'item_order';

    protected $fillable = [
        'quantity',
        'partial_price'
    ];
}
