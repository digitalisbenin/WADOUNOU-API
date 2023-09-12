<?php

namespace App\Http\Resources\Thinks;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThinksResource extends JsonResource
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
        'icon_path'=>$this->icon_path,
        'type'=>$this->type,
        'repas_id'=>$this->repas_id,
    ];
    }
}
