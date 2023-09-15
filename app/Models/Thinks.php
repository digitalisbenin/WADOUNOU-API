<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thinks extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['name', 'description' ,'icon_path','type','repas_id'];

    public function repas()
        {
            return $this->belongsTo(Repas::class);
        }


}
