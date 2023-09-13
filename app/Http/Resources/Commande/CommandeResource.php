<?php

namespace App\Http\Resources\Commande;

use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Repas\RepasCollection;
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
        'id' => $this->id,
        'name'=>$this->name,
        'repas'=>new RepasCollection($this->repas),
        'client'=> new ClientResource($this->client),
        'description'=>$this->description,
        'prix'=>$this->prix,
        'date'=>$this->date,
        'addrese'=>$this->addrese,


    ];
    }
}
