<?php

namespace App\Http\Controllers;

use App\Models\ScanHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScanHistoryRequest;
use App\Http\Requests\UpdateScanHistoryRequest;
use App\Http\Resources\ScanHistoryResource;

class ScanHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScanHistoryRequest $request)
    {
        return new ScanHistoryResource(ScanHistory::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ScanHistory $scanHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScanHistory $scanHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScanHistoryRequest $request, ScanHistory $scanHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScanHistory $scanHistory)
    {
        //
    }
}
