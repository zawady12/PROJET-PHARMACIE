<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded =[];  
    Public function ligne_vente_client()
    {
    return $this -> hasMany(Ligne_vente_client::class) ; 
    }
}
