<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use App\Notifications\NotificationPeremption;
use App\Notifications\NotificationProduit;
use App\Notifications\NotificationStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie = Categorie::all();
        $produit = Produit::all();
        return view('produit', compact('categorie', 'produit'));
    }
    public function tab()
    {
        $user = User::all();
        $categorie = Categorie::all();
        $tabproduit = Produit::all();
        $fournisseur = DB::select('select * from fournisseurs');
        return view('tabproduit', compact('categorie', 'tabproduit', 'fournisseur', 'user'));
    }
    public function tab2()
    {
        $categorie = Categorie::all();
        $tabproduit = Produit::all();
        return view('tabalerte', compact('categorie', 'peremption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom_commercial' => 'required',
            'dci' => 'required',
            'prix' => 'required',
            'date_fabrication' => 'required',
            'date_peremption' => 'required',
            'qnté_stockée' => 'required',
            'categorie_id' => 'required',
            'etagere' => 'required',
            'type' => 'required',
        ]);

        $produit = new Produit;
        $produit->nom_commercial = $request->nom_commercial;
        $produit->dci = $request->dci;
        $produit->prix = $request->prix;
        $produit->date_fabrication = $request->date_fabrication;
        $produit->date_peremption = $request->date_peremption;
        $produit->qnté_stockée = $request->qnté_stockée;
        $produit->categorie_id = $request->categorie_id;
        $produit->etagere = $request->etagere;
        $produit->type = $request->type;
        $save = $produit->save();
        $userSchema = User::first();
        if ($save) {
            $produit['message'] = "Nouveau produit ajouté";
            $userSchema->notify(new NotificationProduit($produit));
            $produit = DB::select('select dci, sum(qnté_stockée) as x from produits group by dci');
            foreach ($produit as $p) {
                if ($p->x <= 10) {
                    $produit['nom'] = $p->dci;
                    $produit['id'] = $p->x;
                    $produit['message'] = "Produit en rupture de stock";
                    $userSchema->notify(new NotificationStock($produit));
                };
            }
            $peremption = DB::select('select id,dci,date_peremption as z from produits');
            $currentTime = Carbon::now()->format("Y-m-d");
            $date = "07000000";
            foreach ($peremption as $pe) {
                if (strtotime($pe->z) - strtotime($currentTime) <= $date) {
                    $peremption['nom'] = $pe->dci;
                    $peremption['id'] = $pe->z;
                    $peremption['message'] = "Produits en voie de péremption";
                    $userSchema->notify(new NotificationPeremption($peremption));
                }
            };

            return back()->with('success', 'produit enregistré avec succès');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $categorie = Categorie::all();
        $produit =  Produit::find($id);

        return view('viewproduit', compact('categorie', 'produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::all();
        $produit = Produit::find($id);
        return view('editproduit', compact('categorie', 'produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nom_commercial' => 'required',
            'dci' => 'required',
            'prix' => 'required',
            'date_fabrication' => 'required',
            'date_peremption' => 'required',
            'qnté_stockée' => 'required',
            'categorie_id' => 'required',
            'etagere' => 'required',
            'type' => 'required',

        ]);
        $produit = Produit::find($request->id);
        $produit->nom_commercial = $request->nom_commercial;
        $produit->dci = $request->dci;
        $produit->prix = $request->prix;
        $produit->date_fabrication = $request->date_fabrication;
        $produit->date_peremption = $request->date_peremption;
        $produit->qnté_stockée = $request->qnté_stockée;
        $produit->categorie_id = $request->categorie_id;
        $produit->etagere = $request->etagere;
        $produit->type = $request->type;
        $save = $produit->save();
        $userSchema = User::first();
        if ($save) {
            $produit['message'] = "Produit edité";
            $userSchema->notify(new NotificationProduit($produit));
            $produit = DB::select('select dci, sum(qnté_stockée) as x from produits group by dci');
            foreach ($produit as $p) {
                if ($p->x <= 10) {
                    $produit['nom'] = $p->dci;
                    $produit['id'] = $p->x;
                    $produit['message'] = "Produit en rupture de stock";
                    $userSchema->notify(new NotificationStock($produit));
                };
            }
            $peremption = DB::select('select id,dci,date_peremption as z from produits');
            $currentTime = Carbon::now()->format("Y-m-d");
            $date = "07000000";
            foreach ($peremption as $pe) {
                if (strtotime($pe->z) - strtotime($currentTime) <= $date) {
                    $peremption['nom'] = $pe->dci;
                    $peremption['id'] = $pe->z;
                    $peremption['message'] = "Produits en voie de péremption";
                    $userSchema->notify(new NotificationPeremption($peremption));
                }
            };
            return back()->with('success', 'produit edité avec succès');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $produit = Produit::find($request->id);
        $delete = $produit->delete();
        $userSchema = User::first();
        if ($delete) {
            $produit['message'] = "Produit supprimé";
            $userSchema->notify(new NotificationProduit($produit));
            return back()->with('success', 'Produit supprimé');
        }
    }

    /* public function stock()
    {
        //definir quantite
        //definir minimum quantite
        //definir stock
        $quantity = DB::select('select count(id) from produits group by nom_commercial');
        $minimum_quantity = 3;
        $produit=DB::select('select * from produits');
        $userSchema = User::first();
        if ($quantity <= $minimum_quantity) {
            $userSchema->notify(new NotificationStock($produit));
            return back();
        }
        else{
            return view('tabproduit', compact('quantity','minimum_quantity','produit','userSchema'));
        }
    }*/
}
