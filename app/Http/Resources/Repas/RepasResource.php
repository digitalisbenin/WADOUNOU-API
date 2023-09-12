<?php

namespace App\Http\Resources\Repas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RepasResource extends JsonResource
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
        'description'=>$this->description,
        'prix'=>$this->prix,
        'jours'=>$this->jours,
        'image_url'=>$this->image_url,
        'restaurant_id'=>$this->restaurant_id,
        'categirie_id'=>$this->categirie_id,
    ];
    }
}
