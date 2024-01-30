<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemOrder;
use App\Http\Requests\StoreItemOrderRequest;
use App\Http\Requests\UpdateItemOrderRequest;

class ItemOrderContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreItemOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemOrderRequest $request, ItemOrder $itemOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOrder $itemOrder)
    {
        //
    }
}
