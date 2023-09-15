<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Categorie\CategorieCollection;
use App\Http\Resources\Categorie\CategorieResource;
use App\Http\Requests\Categorie\StoreCategorieRequest;
use App\Http\Requests\Categorie\UpdateCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CategorieCollection(Categorie::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return new CategorieResource($categorie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return new CategorieResource($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());

        return new CategorieResource($categorie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return response(null, 204);
    }
}
