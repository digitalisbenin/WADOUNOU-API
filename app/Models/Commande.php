<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name' ,'user_id','restaurant_id', 'status','description','contact','adresse','montant','status'];

    

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function restaurant()
        {
            return $this->belongsTo(Restaurant::class);
        }
        public function livraison()
        {
            return $this->hasMany(Livraison::class);
        }
        public function paymentmetod()
        {
            return $this->hasMany(PaymentMethod::class);
        }
        
        public function lignecommande()
        {
            return $this->hasMany(Ligne_commande::class);
        }
        
}
