<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethod extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ['transationId', 'card_brand', 'last4', 'exp_month', 'exp_year',
    'phone_number', 'commande_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
