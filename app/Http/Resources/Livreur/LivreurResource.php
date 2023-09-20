<?php

namespace App\Http\Resources\Livreur;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Restaurant\RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivreurResource extends JsonResource
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
       // return parent::toArray($request);
       return [
        'id' => $this->id,
        'name'=>$this->name,
        'addrese'=>$this->addrese,
        'phone'=>$this->phone,
        'description'=>$this->description,
        'user'=> new UserResource($this->user),
        'restaurant'=>new RestaurantResource($this->restaurant),
    ];
    }
}
