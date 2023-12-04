<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $guarded =[];
    Public function bon_livraison()
    {
    return $this -> hasMany(Bon_livraison::class) ; 
    }  
    Public function bon_commande()
    {
    return $this -> hasMany(Bon_commande::class) ; 
    }
    Public function fournisseur()
    {
    return $this -> belongsTo(Fournisseur::class) ; 
    }
}
