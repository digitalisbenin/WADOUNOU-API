<?php

namespace App\Http\Resources\Livreur;

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
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
       return [
        'name'=>$this->name,
        'addrese'=>$this->addrese,
        'phone'=>$this->phone,
        'description'=>$this->description,
        'restaurant_id'=>$this->restaurant_id,
    ];
    }
}
