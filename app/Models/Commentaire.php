<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['repas_id', 'content'];

    public function repas()
        {
            return $this->belongsTo(Repas::class);
        }
}
