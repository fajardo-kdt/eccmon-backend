<?php

namespace App\Http\Controllers;

use App\Models\AssemblyProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssemblyProcessorRequest;
use App\Http\Requests\UpdateAssemblyProcessorRequest;
use App\Http\Resources\AssemblyProcessorCollection;
use App\Http\Resources\AssemblyProcessorResource;

class AssemblyProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AssemblyProcessorCollection(AssemblyProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssemblyProcessorRequest $request)
    {
        return new AssemblyProcessorResource(AssemblyProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = AssemblyProcessor::find($id);
        return new AssemblyProcessorResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssemblyProcessorRequest $request, $id)
    {
        $item = AssemblyProcessor::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssemblyProcessor $assemblyProcessor)
    {
        //
    }
}
