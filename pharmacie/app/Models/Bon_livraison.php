<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon_livraison extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*Public function livraison()
    {
    return $this -> belongsTo(Livraison::class) ; 
    }*/
    Public function produit()
    {
    return $this -> belongsTo(Produit::class) ; 
    }
    Public function fournisseur()
    {
    return $this -> belongsTo(Fournisseur::class) ; 
    }
}
