<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Repas\RepasCollection;
use App\Http\Resources\Repas\RepasResource;
use App\Http\Requests\Repas\StoreRepasRequest;
use App\Http\Requests\Repas\UpdateRepasRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Repas;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class RepasController extends ApiController
{
    
    public function index()
    {
        return new RepasCollection(Repas::all());
    }

    public function store(StoreRepasRequest $request)
    {
        $repas = Repas::create($request->all());

        return new RepasResource($repas);
    }

    public function show(Repas $repas)
    {
        return new RepasResource($repas);
    }

    public function update(UpdateRepasRequest $request, Repas $repas)
    {
        $repas->update($request->all());
        return new RepasResource($repas);
    }

    public function destroy(Repas $repas)
    {
        $repas->delete();
        return response(null, 204);
    }

    
}