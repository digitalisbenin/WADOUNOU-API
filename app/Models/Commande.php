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

    protected $fillable = ['name', 'repas_id' ,'user_id', 'status','description','contact','addrese'];

    public function repas()
        {
            return $this->belongsTo(Repas::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function livraison()
        {
            return $this->hasMany(Livraison::class);
        }
}
