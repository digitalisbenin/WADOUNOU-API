<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'description' ,'addrese','phone','image_url','user_id','abonnement_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }


    public function livreur()
        {
            return $this->hasMany(Livreur::class);
        }

        public function repas()
        {
            return $this->hasMany(Repas::class);
        }    

        public function reservation()
        {
            return $this->hasMany(Reservation::class);
        }  
}
