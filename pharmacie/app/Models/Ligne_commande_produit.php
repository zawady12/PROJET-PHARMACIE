<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_commande_produit extends Model
{
    use HasFactory;
    protected $guarded = [];
    /*Public function commande()
    {
    return $this -> belongsTo(Commande::class) ; 
    }*/
    Public function produit()
    {
    return $this -> belongsTo(Produit::class) ; 
    }
    Public function user()
    {
    return $this -> belongsTo(User::class) ; 
    }
    Public function fournisseur()
    {
    return $this -> belongsTo(Fournisseur::class) ; 
    }
}
