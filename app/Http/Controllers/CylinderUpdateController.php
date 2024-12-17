<?php

namespace App\Http\Controllers;

use App\Models\CylinderUpdate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCylinderUpdateRequest;
use App\Http\Requests\UpdateCylinderUpdateRequest;
use App\Http\Resources\CylinderUpdateCollection;
use App\Http\Resources\CylinderUpdateResource;
use App\Models\CylinderCover;

class CylinderUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CylinderUpdateCollection(CylinderUpdate::all());
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
    public function store(StoreCylinderUpdateRequest $request)
    {
        $status = $request->process;
        $serialNum = $request->serialNumber;

        $item = CylinderCover::where("serial_number", $serialNum)->first();
        if($status == "Storage" && $item->status == "Dismounted") {
            $item->cycle += 1;
            $request->merge([
                'cycle' => $item->cycle,
            ]);
        }

        $saveUpdate = CylinderUpdate::create($request->all());
        if($saveUpdate) {
            $item->location = $request->location;
            $item->status = $status;
            
            if(isset($request->otherDetails)) {
                $otherDetails = json_decode($request->otherDetails, false);

                if(isset($otherDetails->case)) {
                    $caseNumber = $otherDetails->case;
                    $item->case = $caseNumber;
                }
            }
            $item->save();
            return new CylinderUpdateResource($saveUpdate);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CylinderUpdate $cylinderUpdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CylinderUpdate $cylinderUpdate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCylinderUpdateRequest $request, CylinderUpdate $cylinderUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CylinderUpdate $cylinderUpdate)
    {
        //
    }
}
