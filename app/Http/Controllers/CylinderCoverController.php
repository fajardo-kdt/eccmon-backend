<?php

namespace App\Http\Controllers;

use App\Models\CylinderCover;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCylinderCoverRequest;
use App\Http\Requests\UpdateCylinderCoverRequest;
use App\Http\Resources\CylinderCoverCollection;
use App\Http\Resources\CylinderCoverResource;
use App\Models\CylinderUpdate;
use Illuminate\Http\Request;

class CylinderCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled("status")) {
            $collection = new CylinderCoverCollection([]);
            $status = $request->status;
            if($status == "Process") {
                $status = "Disassembly, Grooving, LMD, Finishing, Assembly";
            }
            $newStat = explode(", ", $status);

            foreach ($newStat as $stat) {
                $toMerge = CylinderCover::where("status", $stat)->with(['updates' => function($query) use ($stat) {
                    $query->where('process', $stat)->latest();
                }])->get()->reverse();

                $collection = $collection->merge($toMerge);
            }

            return new CylinderCoverCollection($collection);
        } else {
            return new CylinderCoverCollection(CylinderCover::all()->reverse());
            // return new CylinderCoverCollection([]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCylinderCoverRequest $request)
    {
        $operations = ["Storage", "Diassembly", "Grooving", "LMD", "Finishing", "Assembly", "Mounted", "Dismounted", "Disposal"];
        $newItem = CylinderCover::create($request->all());

        // foreach($operations as $op) {
        //     $newItem->
        //     CylinderUpdate::
        // }

        $item = CylinderCover::find($newItem->id);

        return new CylinderCoverResource($item);
        // if(CylinderCover::create($request->all))
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $item = CylinderCover::where('serial_number', $id)->with('updates')->first();
        // if($item) {
        //     return new CylinderCoverResource($item);
        // }

        $item = CylinderCover::where('serial_number', $id)->first();
        if($item) {
            $status = $item->status;
            $cycle = $item->cycle;

            $items = CylinderCover::where('serial_number', $id)->with(['updates' => function($query) use ($status, $cycle) {
                    $query->where([['process', "=", $status], ["cycle", "=", $cycle]])->orderBy('id', 'desc');
                }])->first();
                
            if($items) {
                return new CylinderCoverResource($items);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCylinderCoverRequest $request, $id)
    {
        $item = CylinderCover::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CylinderCover $cylinderCover)
    {
        //
    }
}
