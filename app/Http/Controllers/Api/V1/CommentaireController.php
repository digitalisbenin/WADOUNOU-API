<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Commentaire\StoreCommentaireRequest;
use App\Http\Requests\Commentaire\UpdateCommentaireRequest;
use App\Http\Requests\Commentaire\CommentaireCollection;
use App\Http\Requests\Commentaire\CommentaireResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CommentaireCollection(Commentaire::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentaireRequest $request)
    {
        $commentaire = Commentaire::create($request->all());

        return new CommentaireResource($commentaire);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        return new CommentaireResource($commentaire);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->all());
        return new CommentaireResource($commentaire);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return response(null, 204);
    }
}
