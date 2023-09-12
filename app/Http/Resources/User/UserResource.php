<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        'role_id'=>$this->role_id,
        'email'=>$this->email,
        'email_verified_at'=>$this->email_verified_at,
        'password'=>$this->password,
        'remember_token'=>$this->remember_token,
        'current_team_id'=>$this->current_team_id,
        'profile_photo_path'=>$this->profile_photo_path,
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
