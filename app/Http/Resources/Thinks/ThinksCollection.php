<?php

namespace App\Http\Resources\Thinks;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ThinksCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)

    {
        return parent::toArray($request);
    }
}
