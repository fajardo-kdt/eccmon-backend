<?php

namespace App\Http\Controllers;

use App\Models\OrderNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderNumberRequest;
use App\Http\Requests\UpdateOrderNumberRequest;
use App\Http\Resources\OrderNumberCollection;
use App\Http\Resources\OrderNumberResource;

class OrderNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderNumberCollection(OrderNumber::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderNumberRequest $request)
    {
        // return $request;
        return new OrderNumberResource(OrderNumber::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = OrderNumber::find($id);
        return new OrderNumberResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderNumberRequest $request, $id)
    {
        $item = OrderNumber::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderNumber $orderNumber)
    {
        //
    }
}
