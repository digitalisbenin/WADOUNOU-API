<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livreur extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'addrese' ,'phone','description','restaurant_id', 'user_id'];

    public function restaurant()
        {
            return $this->belongsTo(Restaurant::class);
        }

    public function livraison()
        {
            return $this->hasMany(Livraison::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
