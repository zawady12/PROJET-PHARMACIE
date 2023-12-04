<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\Commande_produit;
use App\Models\Ligne_commande_produit;
use App\Notifications\NotificationCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Ligne_commande_produitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        $ligne_commande_produit = Ligne_commande_produit::all();
        return view('ligne_commande_produit',compact('user','produit','ligne_commande_produit','fournisseur'));
    }
    public function tab()
    {
        $user= User::all();
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        $tabligne_commande_produit = Ligne_commande_produit::all();
        return view('tabligne_commande_produit',compact('user','produit','tabligne_commande_produit','fournisseur'));
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
            'num_commande' => ['required','unique:ligne_commande_produits'],
            'produit_id' => 'required',
            'qnté_commandée' => 'required',
            'date_commande' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'fournisseur_id' => 'required',
        ]);

        $ligne_commande_produit = new Ligne_commande_produit;
        $ligne_commande_produit->num_commande = $request->num_commande;
        $ligne_commande_produit->produit_id = $request->produit_id;
        $ligne_commande_produit->qnté_commandée = $request->qnté_commandée;
        $ligne_commande_produit->date_commande = $request->date_commande;
        $ligne_commande_produit->description = $request->description;
        $ligne_commande_produit->user_id = $request->user_id;
        $ligne_commande_produit->fournisseur_id = $request->fournisseur_id;
        $save =$ligne_commande_produit->save();
        $userSchema = User::first();
        if($save){
            $ligne_commande_produit['message']="Nouvelle commande passée";
            $userSchema->notify(new NotificationCommande($ligne_commande_produit));
            return back()->with('success','commande enregistrée avec succès');
        }else{
            return back()->with('fail','une erreur sest produite');

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
        $user= User::all();
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        $ligne_commande_produit= Ligne_commande_produit::find($id);
        return view ('viewligne_com_prod',compact('user','produit','ligne_commande_produit','fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::all();
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        $ligne_commande_produit= Ligne_commande_produit::find($id);
        return view ('editligne_com_produit',compact('user','produit','ligne_commande_produit','fournisseur'));
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
            'num_commande' => 'required',
            'produit_id' => 'required',
            'qnté_commandée' => 'required',
            'date_commande' => 'required',
            'description' => 'required',
            'user_id' => 'required',  
            'fournisseur_id' => 'required',
        ]);
        $ligne_commande_produit= Ligne_commande_produit::find($request->id);
        $ligne_commande_produit->num_commande = $request->num_commande;
        $ligne_commande_produit->produit_id = $request->produit_id;
        $ligne_commande_produit->qnté_commandée = $request->qnté_commandée;
        $ligne_commande_produit->date_commande = $request->date_commande;
        $ligne_commande_produit->description = $request->description;
        $ligne_commande_produit->user_id = $request->user_id;
        $ligne_commande_produit->fournisseur_id = $request->fournisseur_id;
        $save=$ligne_commande_produit->save();
        $userSchema = User::first();
        if($save){
            $ligne_commande_produit['message']="Commande mise à jour";
            $userSchema->notify(new NotificationCommande($ligne_commande_produit));
            return back()->with('success','Bon de commande edité avec succès');
        }else{
            return back()->with('fail','une erreur sest produite');

        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $ligne_commande_produit= ligne_commande_produit::find($request->id);
        $delete=$ligne_commande_produit->delete();
        $userSchema = User::first();
        if($delete){
            $client['message']="Commmande supprimée";
            $userSchema->notify(new NotificationCommande($ligne_commande_produit));
            return back()->with('success','Ligne supprimée');
        }else{
            return back()->with('fail','une erreur sest produite');

        }  
    }

    
}
