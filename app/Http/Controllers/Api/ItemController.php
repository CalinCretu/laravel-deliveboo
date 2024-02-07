<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {

        $items = Item::all();


        return response()->json([
            'success' => true,
            'results' => $items
        ]);
    }
}
