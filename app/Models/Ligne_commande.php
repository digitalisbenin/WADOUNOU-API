<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_commande extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [ 'repas_id','montant','quantite','commande_id'];

    public function repas()
        {
            return $this->belongsTo(Repas::class);
        }
         
        public function commande()
        {
            return $this->belongsTo(Commande::class);
        }
        
}
