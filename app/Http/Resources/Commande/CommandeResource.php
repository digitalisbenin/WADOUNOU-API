<?php

namespace App\Http\Resources\Commande;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
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
      //  return parent::toArray($request);
      return [

        'name'=>$this->name,
        'repas_id'=>$this->repas_id,
        'client_id'=>$this->client_id,
        'description'=>$this->description,
        'prix'=>$this->prix,
        'date'=>$this->date,
        'addrese'=>$this->addrese,


    ];
    }
}
