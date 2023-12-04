<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Notifications\NotificationStock;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashController extends Controller
{

   
    public function index()
    {
        $categorie = DB::table('categories')->count();
        $client = DB::table('clients')->count();
        $user = DB::table('users')->count();
        $fournisseur = DB::table('fournisseurs')->count();
        $produit = DB::table('produits')->count();
        $prod = DB::table('produits')->count();
        $stock = DB::table('stocks')->count();
        $peremption = DB::table('peremptions')->count();
        $vente = DB::table('ventes')->count();
        $ligne_vente_client = DB::table('ligne_vente_clients')->count();

        return view('dashboard1', compact('categorie', 'client', 'user', 'fournisseur', 'produit','stock','peremption','vente','ligne_vente_client'));
    }

    // window.open('URL', 'nom', 'options');

    public function index2()
    {

        $peremption = DB::select('select count(id) as datas FROM `notifications` WHERE json_extract(data,"$.message")= "Produits en voie de péremption"');
        $stock = DB::select('select count(id) as valeurs FROM `notifications` WHERE json_extract(data,"$.message")= "Produit en rupture de stock"');
        $produit = DB::table('produits')->count();
        $datas = DB::select('select id,dci,nom_commercial,MAX(id) from produits group by dci,nom_commercial,id LIMIT 3');
        $categorie = DB::table('categories')->count();
        $client = DB::table('clients')->count();
        $top = DB::select('select id,num_vente,montant from ventes group by id,num_vente,montant LIMIT 3');
        $user = DB::table('users')->count();
        $fournisseur = DB::table('fournisseurs')->count();



        $data = "";
        $users = DB::select(DB::raw("select count(nom_commercial) as nom ,
        categories.type from produits left join categories on produits.categorie_id = categories.id group by categories.type"));
        foreach ($users as $val) {
            $data .= "['" . $val->type . "',      " . $val->nom . "],";
        }
        $charData = $data;
        return view('dashboard', compact('categorie', 'client', 'user', 'fournisseur',
         'charData', 'datas', 'top','stock','peremption','produit'));

    }

   
}
