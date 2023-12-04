<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon_commande extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function livraison()
    {
    return $this -> belongsTo(Livraison::class) ; 
    }
    Public function commande()
    {
    return $this -> belongsTo(Commande::class) ; 
    }
}
