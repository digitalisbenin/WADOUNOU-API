<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\LigneCommande\LigneCommandeResource;
use App\Http\Resources\LigneCommande\LigneCommandeCollection;
use App\Http\Requests\LigneCommande\StoreLigneCommandeRequest;
use App\Http\Requests\LigneCommande\UpdateLigneCommandeRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Ligne_commande;
use Illuminate\Http\Request;

class LigneCommandeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LigneCommandeCollection(Ligne_commande::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLigneCommandeRequest $request)
    {
        $ligne_commande = Ligne_commande::create($request->all());

        return new LigneCommandeResource($ligne_commande);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ligne_commande  $ligne_commande
     * @return \Illuminate\Http\Response
     */
    public function show(Ligne_commande $ligne_commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ligne_commande  $ligne_commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ligne_commande $ligne_commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ligne_commande  $ligne_commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ligne_commande $ligne_commande)
    {
        $ligne_commande->delete();

        return response(null, 204);
    }
}
