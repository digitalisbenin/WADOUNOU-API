<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Thinks\StoreThinksRequest;
use App\Http\Requests\Thinks\UpdateThinksRequest;
use App\Http\Resources\Thinks\ThinksCollection;
use App\Http\Resources\Thinks\ThinksResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Thinks;
use Illuminate\Http\Request;

class ThinksController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ThinksCollection(Thinks::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThinksRequest $request)
    {
        $thinks = Thinks::create($request->all());

        return new ThinksResource($thinks);
    }

    /**
     * Display the specified resource.
     */
    public function show(Thinks $thinks)
    {
        return new ThinksResource($thinks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThinksRequest $request, Thinks $thinks)
    {
        $thinks->update($request->all());
        return new ThinksResource($thinks);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thinks $thinks)
    {
        $thinks->delete();
        return response(null, 204);
    }
}
