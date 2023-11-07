<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->description,
            'pseudo'=>$this->pseudo,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'adresse'=>$this->adresse,
        ];
    }
}
