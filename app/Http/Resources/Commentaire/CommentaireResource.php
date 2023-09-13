<?php

namespace App\Http\Resources\Commentaire;

use App\Http\Resources\Repas\RepasCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content'=>$this->content,
            'repas'=>new RepasCollection($this->repas),
    
        ];
    }
}
