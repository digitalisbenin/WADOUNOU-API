<?php

namespace App\Http\Resources\PaymentMethod;

use App\Http\Resources\Commande\CommandeResource;
//use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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

            'transationId' => $this->transationId,
            
            'commande'=> new CommandeResource($this->commande),
            
        ];
    }
}
