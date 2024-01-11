<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethod extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['transationId','commande_id'];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
