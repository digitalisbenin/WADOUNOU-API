<?php

namespace App\Http\Resources\Commande;

use App\Http\Resources\LigneCommande\LigneCommandeResource;
use App\Http\Resources\Repas\RepasResource;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
{
       /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)

    {
      //  return parent::toArray($request);
      return [
        'id' => $this->id,
        'name'=>$this->name,
        'user'=>new UserResource($this->user),
        'restaurant'=> new RestaurantResource($this->restaurant),
        'description'=>$this->description,
        'status'=>$this->status,
        'contact'=>$this->contact,
        'adresse'=>$this->adresse,
        'montant'=>$this->montant,



    ];
    }
}
