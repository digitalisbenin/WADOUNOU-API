<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory , Uuid ;

    protected $fillable = ['name', 'prix' ,'restaurant_id','description','repas_id'];

    public function repas()
    {
        return $this->belongsTo(Repas::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
