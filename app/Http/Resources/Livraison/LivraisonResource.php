<?php

namespace App\Http\Resources\Livraison;

use App\Http\Resources\Livreur\LivreurResource;
use App\Http\Resources\Commande\CommandeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivraisonResource extends JsonResource
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
        'status'=>$this->status,
        'commande'=>new CommandeResource($this->commande),
        'livreur'=>new LivreurResource($this->commande),

    ];
    }
}
