<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Item;
use App\Models\ItemOrder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $user = Auth::user();
        if ($slug == $user->slug) {
            $orders = Order::where('user_id', '=', $user->id)->orderBy('order_date', 'desc')->get();
            $orders_amount = Order::where('user_id', '=', $user->id)->orderBy('total_price', 'desc')->get();
            $items = Item::where('user_id', '=', $user->id)->get();
            return view('admin.orders.index', compact('user', 'orders', 'orders_amount', 'items'));
        } else {
            return view('admin.errors.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
