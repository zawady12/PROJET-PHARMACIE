<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function vente()
    {
    return $this -> hasMany(Vente::class) ; 
    }
    Public function commande()
    {
    return $this -> hasMany(Commande::class) ; 
    }
    Public function role()
    {
    return $this -> belongsTo(Role::class) ; 
    }
}
