<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Peremption;
use App\Models\Vente;
use Illuminate\Support\Facades\DB;

class AlerteController extends Controller
{
    public function index()
    {
        $produit = Produit::all();
        $notification = DB::select('select data FROM `notifications` WHERE json_extract(data,"$.message")= "Produit en rupture de stock"');
        //$datas = json_decode($notification['data'], true);
        return view('tabalerte', compact('produit','notification'));
    }

    public function index2()
    {
        $produit = Produit::all();
        $peremption = DB::select('select data
        FROM `notifications` 
        WHERE json_extract(data,"$.message")= "Produits en voie de péremption"');
        return view('tabperemption', compact('produit','peremption'));
    }
    public function index3()
    {
        $vente = Vente::all();
        $ventes = DB::select('select data
        FROM `notifications` 
        WHERE json_extract(data,"$.message")= "Nouvelle vente effectuée"');
        return view('historiquevente', compact('vente','ventes'));
    }
}
