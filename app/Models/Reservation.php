<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'description' ,'place','date','restaurant_id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
