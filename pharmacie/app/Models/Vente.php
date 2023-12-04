<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function ligne_vente_client()
    {
    return $this -> hasMany(Ligne_vente_client::class) ; 
    }
    Public function ligne_vente()
    {
    return $this -> hasMany(Ligne_vente_client::class) ; 
    }
    Public function user()
    {
    return $this -> belongsTo(User::class) ; 
    }
    Public function produit()
    {
    return $this -> belongsTo(Produit::class) ; 
    }
}
