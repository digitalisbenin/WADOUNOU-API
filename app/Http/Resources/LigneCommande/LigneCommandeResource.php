<?php

namespace App\Http\Resources\LigneCommande;

use App\Http\Resources\Commande\CommandeResource;
use App\Http\Resources\Repas\RepasResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LigneCommandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'montant' => $this->montant,
            'quantite' => $this->quantite,
            'repas'=> new RepasResource($this->repas),
            'commande'=>new CommandeResource($this->commande),
            
        ];
    }
}
