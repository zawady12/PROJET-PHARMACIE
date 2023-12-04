<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_vente extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function vente()
    {
    return $this -> belongsTo(Vente::class) ; 
    }
    Public function produit()
    {
    return $this -> belongsTo(Produit::class) ; 
    }
}
