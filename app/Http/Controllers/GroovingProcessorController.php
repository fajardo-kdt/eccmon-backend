<?php

namespace App\Http\Controllers;

use App\Models\GroovingProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroovingProcessorRequest;
use App\Http\Requests\UpdateGroovingProcessorRequest;
use App\Http\Resources\GroovingProcessorCollection;
use App\Http\Resources\GroovingProcessorResource;

class GroovingProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GroovingProcessorCollection(GroovingProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroovingProcessorRequest $request)
    {
        return new GroovingProcessorResource(GroovingProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = GroovingProcessor::find($id);
        return new GroovingProcessorResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroovingProcessorRequest $request, $id)
    {
        $item = GroovingProcessor::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroovingProcessor $groovingProcessor)
    {
        //
    }
}
