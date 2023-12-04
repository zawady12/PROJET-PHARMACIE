<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function user()
    {
    return $this -> belongsTo(User::class) ; 
    }
    Public function bon_commande()
    {
    return $this -> hasMany(Bon_commande::class) ; 
    }  
    Public function ligne_commande_produit()
    {
    return $this -> hasMany(Ligne_commande_produit::class) ; 
    } 
}
