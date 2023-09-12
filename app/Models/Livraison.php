<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory , Uuid ;

    protected $fillable = ['name', 'addrese' ,'phone','description','status','commande_id','livreur_id'];

    public function commande()
        {
            return $this->belongsTo(Commande::class);
        }

        public function livreur()
        {
            return $this->belongsTo(Livreur::class);
        }
}
