<?php

namespace App\Http\Resources\Reservation;

use App\Http\Resources\Restaurant\RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
        'description'=>$this->description,
        'place'=>$this->place,
        'contact'=>$this->contact,
        'date'=>$this->date,
        'restaurant'=> new RestaurantResource($this->restaurant),
    ];
    }
}
