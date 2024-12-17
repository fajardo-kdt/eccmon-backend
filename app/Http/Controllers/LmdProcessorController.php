<?php

namespace App\Http\Controllers;

use App\Models\LmdProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLmdProcessorRequest;
use App\Http\Requests\UpdateLmdProcessorRequest;
use App\Http\Resources\LmdProcessorCollection;
use App\Http\Resources\LmdProcessorResource;

class LmdProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LmdProcessorCollection(LmdProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLmdProcessorRequest $request)
    {
        return new LmdProcessorResource(LmdProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = LmdProcessor::find($id);
        return new LmdProcessorResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLmdProcessorRequest $request, $id)
    {
        $item = LmdProcessor::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LmdProcessor $lmdProcessor)
    {
        //
    }
}
