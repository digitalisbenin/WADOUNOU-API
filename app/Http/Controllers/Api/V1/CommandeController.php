<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Commande\StoreCommandeRequest;
use App\Http\Requests\Commande\UpdateCommandeRequest;
use App\Http\Resources\Commande\CommandeCollection;
use App\Http\Resources\Commande\CommandeResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CommandeCollection(Commande::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommandeRequest $request)
    {
        $commande = Commande::create($request->all());

        return new CommandeResource($commande);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        return new CommandeResource($commande);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $commande->update($request->all());

        return new CommandeResource($commande);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();

        return response(null, 204);
    }
}
