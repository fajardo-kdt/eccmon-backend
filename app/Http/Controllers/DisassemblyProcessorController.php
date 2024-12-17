<?php

namespace App\Http\Controllers;

use App\Models\DisassemblyProcessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisassemblyProcessorRequest;
use App\Http\Requests\UpdateDisassemblyProcessorRequest;
use App\Http\Resources\DisassemblyProcessorCollection;
use App\Http\Resources\DisassemblyProcessorResource;

use function Laravel\Prompts\error;

class DisassemblyProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DisassemblyProcessorCollection(DisassemblyProcessor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDisassemblyProcessorRequest $request)
    {
        return new DisassemblyProcessorResource(DisassemblyProcessor::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = DisassemblyProcessor::find($id);
        return new DisassemblyProcessorResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisassemblyProcessorRequest $request, $id)
    {
        $item = DisassemblyProcessor::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DisassemblyProcessor $disassemblyProcessor)
    {
        //
    }
}
