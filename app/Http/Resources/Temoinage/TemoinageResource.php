<?php

namespace App\Http\Resources\Temoinage;

use Illuminate\Http\Resources\Json\JsonResource;

class TemoinageResource extends JsonResource
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
            'name' => $this->name,
            'content' => $this->content,
            'status'=>$this->status,
            
        ];
    }
}
