<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    use HasFactory , Uuid ;

    protected $fillable = ['name', 'adresse' ,'phone','description','status','commande_id','livreur_id'];

    public function commande()
        {
            return $this->belongsTo(Commande::class);
        }

        public function livreur()
        {
            return $this->belongsTo(Livreur::class);
        }
}
