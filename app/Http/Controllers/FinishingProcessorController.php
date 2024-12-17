<?php

namespace App\Http\Controllers;

use App\Models\FinishingProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinishingProcessorRequest;
use App\Http\Requests\UpdateFinishingProcessorRequest;
use App\Http\Resources\FinishingProcessorCollection;
use App\Http\Resources\FinishingProcessorResource;

class FinishingProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new FinishingProcessorCollection(FinishingProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinishingProcessorRequest $request)
    {
        return new FinishingProcessorResource(FinishingProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = FinishingProcessor::find($id);
        return new FinishingProcessorResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinishingProcessorRequest $request, $id)
    {
        $item = FinishingProcessor::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinishingProcessor $finishingProcessor)
    {
        //
    }
}
