<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Repas\RepasCollection;
use App\Http\Resources\Repas\RepasResource;
use App\Http\Requests\Repas\StoreRepasRequest;
use App\Http\Requests\Repas\UpdateRepasRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Repas;
use Illuminate\Http\Request;

class RepasController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RepasCollection(Repas::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepasRequest $request)
    {
        $repas = Repas::create($request->all());

        return new RepasResource($repas);
    }

    /**
     * Display the specified resource.
     */
    public function show(Repas $repas)
    {
        return new RepasResource($repas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepasRequest $request, Repas $repas)
    {
        $repas->update($request->all());
        return new RepasResource($repas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repas $repas)
    {
        $repas->delete();
        return response(null, 204);
    }
}
