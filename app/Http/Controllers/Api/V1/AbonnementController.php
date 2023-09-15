<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Abonnement\StoreAbonnementRequest;
use App\Http\Requests\Abonnement\UpdateAbonnementRequest;
use App\Http\Resources\Abonnement\AbonnementCollection;
use App\Http\Resources\Abonnement\AbonnementResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AbonnementCollection(Abonnement::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbonnementRequest $request)
    {
        $abonnement = Abonnement::create($request->all());

        return new AbonnementResource($abonnement);
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonnement $abonnement)
    {
        return new AbonnementResource($abonnement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbonnementRequest $request, Abonnement $abonnement)
    {
        $abonnement->update($request->all());

        return new AbonnementResource($abonnement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonnement $abonnement)
    {
        $abonnement->delete();

        return response(null, 204);
    }
}
