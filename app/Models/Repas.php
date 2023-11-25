<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repas extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'description' ,'prix','like','image_url','categoris_id','user_id'];

    


            public function users()
            {
                return $this->belongsTo(User::class);
            }

            public function categoris()
            {
                return $this->belongsTo(Category::class);
            }

        public function commande()
        {
            return $this->hasMany(Commande::class);
        }

        public function think()
        {
            return $this->hasMany(Thinks::class);
        }

        public function commentaire()
        {
            return $this->hasMany(Commentaire::class);
        }

        public function menu()
        {
            return $this->hasMany(Menu::class);
        }
}
