<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'addrese' ,'phone','description','restaurant_id'];

    public function restaurant()
        {
            return $this->belongsTo(Restaurant::class);
        }

    public function livraison()
        {
            return $this->hasMany(Livraison::class);
        }
}
