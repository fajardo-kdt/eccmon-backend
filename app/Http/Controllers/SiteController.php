<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Resources\SiteCollection;
use App\Http\Resources\SiteResource;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SiteCollection(Site::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteRequest $request)
    {
        return new SiteResource(Site::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Site::find($id);
        return new SiteResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, $id)
    {
        $item = Site::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
