<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $guarded =[];
    Public function categorie()
    {
    return $this -> belongsTo(Categorie::class) ; 
    }  
    Public function ligne_vente()
    {
    return $this -> hasMany(Ligne_vente::class) ; 
    }  
    Public function bon_livraison()
    {
    return $this -> hasMany(Bon_livraison::class) ; 
    }
    Public function ligne_commande()
    {
    return $this -> hasMany(Ligne_commande::class) ; 
    }
}
