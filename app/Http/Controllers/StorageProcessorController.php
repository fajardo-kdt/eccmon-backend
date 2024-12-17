<?php

namespace App\Http\Controllers;

use App\Models\StorageProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStorageProcessorRequest;
use App\Http\Requests\UpdateStorageProcessorRequest;
use App\Http\Resources\StorageProcessorCollection;
use App\Http\Resources\StorageProcessorResource;

class StorageProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new StorageProcessorCollection(StorageProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStorageProcessorRequest $request)
    {
        return new StorageProcessorResource(StorageProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $test = StorageProcessor::find($id);
        return new StorageProcessorResource($test);
        // return $storageProcessor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageProcessorRequest $request, $id)
    {
        $storageProcessor = StorageProcessor::find($id);
        $storageProcessor->update($request->all());
        return $storageProcessor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StorageProcessor $storageProcessor)
    {
        $storageProcessor->destroy;
    }
}
