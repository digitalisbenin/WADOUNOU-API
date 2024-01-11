<?php

namespace App\Http\Resources\Restaurant;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Abonnement\AbonnementResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
        return [
            'id' => $this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'adresse'=>$this->adresse,
            'ville'=>$this->ville,
            'phone'=>$this->phone,
            'image_url'=>$this->image_url,
            'specilite'=>$this->specilite,
            'heure_douverture'=>$this->heure_douverture,
            'heure_fermeture'=>$this->heure_fermeture,
            'document_url'=>$this->document_url,
            'capacite'=>$this->capacite,
            'status'=>$this->status,
            'user'=> new UserResource($this->user),
            'abonnement'=> new AbonnementResource($this->abonnement),
        ];
    }
}
