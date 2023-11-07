<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory ,Uuid;

    protected $fillable = ['name', 'pseudo','email','phone','adresse'];
}
