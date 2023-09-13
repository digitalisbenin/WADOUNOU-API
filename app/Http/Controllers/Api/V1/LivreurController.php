<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Livreur\StoreLivreurRequest;
use App\Http\Requests\Livreur\UpdateLivreurRequest;
use App\Http\Requests\Livreur\LivreurCollection;
use App\Http\Requests\Livreur\LivreurResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Livreur;
use Illuminate\Http\Request;

class LivreurController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LivreurCollection(Livreur::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivreurRequest $request)
    {
        $livreur = Livreur::create($request->all());

        return new LivreurResource($livreur);
    }

    /**
     * Display the specified resource.
     */
    public function show(Livreur $livreur)
    {
        return new LivreurResource($livreur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivreurRequest $request, Livreur $livreur)
    {
        $livreur->update($request->all());
        return new LivreurResource($livreur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livreur $livreur)
    {
        $livreur->delete();

        return response(null, 204);
    }
}
