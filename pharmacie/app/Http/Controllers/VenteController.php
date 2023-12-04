<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\User;
use App\Models\Produit;
use App\Notifications\NotificationVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $vente = Vente::all();
        $produit = Produit::all();
        return view('vente', compact('user', 'vente', 'produit'));
    }
    public function tab()
    {
        $user = User::all();
        $produit = Produit::all();
        $tabvente = Vente::all();
        $client = DB::select('select * from clients');

        return view('tabvente', compact('user', 'tabvente', 'produit', 'client'));
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
            'num_vente' => ['required', 'unique:ventes'],
            'produit_id' => 'required',
            'prix_vente' => 'required',
            'qnté_vendu' => 'required',
            'montant' => 'required',
            'date_vente' => 'required',
            'libelle' => 'required',
            'user_id' => 'required',
        ]);

        $vente = new Vente;
        $vente->num_vente = $request->num_vente;
        $vente->produit_id = $request->produit_id;
        $vente->prix_vente = $request->prix_vente;
        $vente->qnté_vendu = $request->qnté_vendu;
        $vente->montant = $request->montant;
        $vente->date_vente = $request->date_vente;
        $vente->libelle = $request->libelle;
        $vente->user_id = $request->user_id;


        // if ($product->qnté_stockée < $r->qnté_vendu) {
        //     $request->session()->flash('message', 'Nous sommes désolés mais ce produit 
        // ne dispose pas d\'un stock suffisant pour satisfaire votre demande ');
        //     return back();
        // } else {
        $save = $vente->save();
        $userSchema = User::first();
        if ($save) {
            $vente['message'] = "Nouvelle vente effectuée";
            $userSchema->notify(new NotificationVente($vente));
            $ventes = Vente::get();
            foreach ($ventes as $r) {
                $product = Produit::findOrFail($r->produit_id);
            }
            $option = DB::update('UPDATE produits SET 
                    qnté_stockée = qnté_stockée - ' . $vente->qnté_vendu . ' 
                    where id = ?', [$vente->produit_id]);

            return back()->with('messages', 'Stock mis à jour');
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
        $user = User::all();
        $vente =  Vente::find($id);
        $produit = Produit::all();

        return view('viewvente', compact('user', 'vente', 'produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::all();
        $vente = Vente::find($id);
        $produit = Produit::all();

        return view('editvente', compact('user', 'vente', 'produit'));
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
            'num_vente' => 'required',
            'produit_id' => 'required',
            'prix_vente' => 'required',
            'qnté_vendu' => 'required',
            'montant' => 'required',
            'date_vente' => 'required',
            'libelle' => 'required',
            'user_id' => 'required',

        ]);
        $vente = Vente::find($request->id);
        $vente->num_vente = $request->num_vente;
        $vente->produit_id = $request->produit_id;
        $vente->prix_vente = $request->prix_vente;
        $vente->qnté_vendu = $request->qnté_vendu;
        $vente->montant = $request->montant;
        $vente->date_vente = $request->date_vente;
        $vente->libelle = $request->libelle;
        $vente->user_id = $request->user_id;
        $save = $vente->save();
        $userSchema = User::first();

        if ($save) {
            $vente['message'] = "Vente editée";
            $userSchema->notify(new NotificationVente($vente));

            return back()->with('success', 'vente modifiée avec succès');
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
        $vente = Vente::find($request->id);
        $delete = $vente->delete();
        $userSchema = User::first();

        if ($delete) {
            $vente['message'] = "Vente supprimée";
            $userSchema->notify(new NotificationVente($vente));

            return back()->with('success', 'vente supprimée');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }
    }
}


    //     public function store(Request $request, Shipping $ship)
    // {
    //     // Vérification du stock
    //     $items = Cart::getContent();
    //     foreach($items as $row) {
    //         $product = Product::findOrFail($row->id);
    //         if($product->quantity < $row->quantity) {
    //             $request->session()->flash('message', 'Nous sommes désolés mais le produit "' 
    //             . $row->name . '" ne dispose pas d\'un stock suffisant pour satisfaire votre demande. Il ne nous reste plus que ' 
    //             . $product->quantity . ' exemplaires disponibles.');
    //             return back();
    //         }
    //     }
    // }