<?php

namespace App\Http\Resources\PaymentMethod;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'card_brand' => $this->card_brand,
            'last4' => $this->last4,
            'type' => $this->type,
            'exp_month' => $this->exp_month,
            'exp_year' => $this->exp_year,
            'phone_number' => $this->phone_number,
            'user'=> new UserResource($this->user),
            
        ];
    }
}
