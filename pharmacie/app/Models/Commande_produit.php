<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_produit extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    Public function produit()
    {
    return $this -> belongsTo(Produit::class) ; 
    }
    Public function fournisseur()
    {
    return $this -> belongsTo(Fournisseur::class) ; 
    }
    Public function user()
    {
    return $this -> belongsTo(User::class) ; 
    }
}
