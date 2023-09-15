<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Livraison\LivraisonCollection;
use App\Http\Resources\Livraison\LivraisonResource;
use App\Http\Requests\Livraison\StoreLivraisonRequest;
use App\Http\Requests\Livraison\UpdateLivraisonRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LivraisonCollection(Livraison::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivraisonRequest $request)
    {
        $livraison = Livraison::create($request->all());

        return new LivraisonResource($livraison);
    }

    /**
     * Display the specified resource.
     */
    public function show(Livraison $livraison)
    {
        return new LivraisonResource($livraison);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivraisonRequest $request, Livraison $livraison)
    {
        $livraison->update($request->all());
        return new LivraisonResource($livraison);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();

        return response(null, 204);
    }
}
