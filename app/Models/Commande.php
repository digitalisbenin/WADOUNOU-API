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

    protected $fillable = ['name', 'repas_id' ,'client_id','description','prix','date','addrese'];

    public function repas()
        {
            return $this->belongsTo(Repas::class);
        }

        public function client()
        {
            return $this->belongsTo(Client::class);
        }

        public function livraison()
        {
            return $this->hasMany(Livraison::class);
        }
}
