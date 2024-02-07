<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'order_date' => 'required',
            'client_address' => 'required|string',
            'total_price' => 'required',
            'details' => 'nullable',
            'client_email' => 'required|email',
            'client_phone' => 'required',
            'client_name' => 'required|string',
            'user_id' => 'exists:user,id',
            'item_id' => 'esists:item,id'
        ]);

        $data = $request->all();

        $new_order = Order::create($data);


        if ($new_order) {

            return response()->json([
                'status' => 200,
                'message' => $new_order
            ], 200);
        } else {

            return response()->json([
                'status' => 500,
                'message' => 'failed'
            ], 500);
        }

        // $new_order->items()->attach($data);
    }
}
