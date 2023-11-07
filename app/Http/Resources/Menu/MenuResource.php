<?php

namespace App\Http\Resources\Menu;

use App\Http\Resources\Repas\RepasResource;
use App\Http\Resources\Restaurant\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'prix'=>$this->prix,
            'repas'=>new RepasResource($this->repas),
            'restaurant'=>new RestaurantResource($this->restaurant),
        ];
    }
}
