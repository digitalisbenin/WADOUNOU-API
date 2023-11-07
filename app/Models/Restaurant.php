<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'description' ,'adresse','phone','image_url','user_id','abonnement_id','specilite','heure_douverture','heure_fermeture','document_url','capacite'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }



        public function reservation()
        {
            return $this->hasMany(Reservation::class);
        }  

        public function menu()
        {
            return $this->hasMany(Menu::class);
        }
}
