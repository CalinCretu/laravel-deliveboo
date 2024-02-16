<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'order_date' => ['required'],
            'client_address' => ['required', 'string'],
            'total_price' => ['required'],
            'details' => ['nullable', 'string'],
            'client_email' => ['required', 'email'],
            'client_phone' => ['required'],
            'client_name' => ['required', 'string'],
            // 'user_id' => 'exists:user,id',
            // 'item_id' => 'esists:item,id',
            'items.*.quantity' => ['required', 'numeric'],
            'items.*.partial_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $data = $request->all();
        // $new_order = $data;

        $new_order = new Order();

        $new_order->order_date = $data['order_date'];
        $new_order->client_address = $data['client_address'];
        $new_order->total_price = $data['total_price'];
        $new_order->details = $data['details'];
        $new_order->client_email = $data['client_email'];
        $new_order->client_phone = $data['client_phone'];
        $new_order->client_name = $data['client_name'];
        $new_order->user_id = $data['user_id'];

        $new_order->save();

        // Salvataggio degli articoli nella tabella pivot item_order
        foreach ($data['items'] as $itemData) {
            $item_order = new ItemOrder();

            $item_order->order_id = $new_order->id;
            $item_order->item_id = $itemData['item_id'];
            $item_order->quantity = $itemData['quantity'];
            $item_order->partial_price = $itemData['partial_price'];
            $item_order->save();
        }

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
    }
}
