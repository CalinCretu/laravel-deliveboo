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
            'orders.*.order_date' => ['required|'],
            'orders.*.client_address' => ['required', 'string'],
            'orders.*.total_price' => ['required'],
            'orders.*.details' => ['nullable', 'string'],
            'orders.*.client_email' => ['required', 'email'],
            'orders.*.client_phone' => ['required'],
            'orders.*.client_name' => ['required', 'string'],
            // 'user_id' => 'exists:user,id',
            // 'item_id' => 'esists:item,id',
            'orders.*.quantity' => ['required', 'numeric'],
            'orders.*.partial_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $data = $request->all();

        foreach ($data as $order) {
            $new_order = new Order();

            $new_order->order_date = $order['order_date'];
            $new_order->client_address = $order['client_address'];
            $new_order->total_price = $order['total_price'];
            $new_order->details = $order['details'];
            $new_order->client_email = $order['client_email'];
            $new_order->client_phone = $order['client_phone'];
            $new_order->client_name = $order['client_name'];
            $new_order->user_id = $order['user_id'];

            $new_order->save();
        }

        // Salvataggio degli articoli nella tabella pivot item_order
        foreach ($data as $itemData) {
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
