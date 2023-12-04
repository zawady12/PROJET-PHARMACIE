<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ligne_commande_produit;
use App\Models\Produit;
use App\Models\Fournisseur;
use App\Notifications\NotificationCommande;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $user = DB::select('select * from users,roles where role_id = ? and users.role_id = roles.id', [1]);
    //     $commande = Commande::all();
    //     return view('commande',compact('user','commande'));
    // }
    // public function tab()
    // {
    //     $user = User::all();
    //     $tabcommande = Commande::all();
    //     return view('tabcommande',compact('user','tabcommande'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'num_commande' => 'required',
    //         'description' => 'required',
    //         'user_id' => 'required',
    //     ]);

    //     $commande = new Commande;
    //     $commande->num_commande = $request->num_commande;
    //     $commande->description = $request->description;
    //     $commande->user_id = $request->user_id;
    //     $commande->save();

        
    //     return redirect()->route('getcommande')->with('success','commande enregistrée');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $user = User::all();
    //     $commande =  Commande::find($id);

    //     return view('viewcommande', compact('user','commande'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $user = User::all();
    //     $commande= Commande::find($id);
    //     return view ('editcommande',compact('user','commande'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request)
    // {
    //     $this->validate($request, [
    //         'num_commande' => 'required',
    //         'description' => 'required',
    //         'user_id' => 'required',

    //     ]);
    //     $commande= Commande::find($request->id);
    //     $commande->num_commande = $request->num_commande;
    //     $commande->description = $request->description;
    //     $commande->user_id = $request->user_id;
      
    //     $commande->save();
    //     return redirect('/tabcommande')->with('success','commande modifiée');

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Request $request,$id)
    // {
    //     $commande= Commande::find($request->id);
    //     $commande->delete();
    
    //     return back()->with('success','commande supprimée');
    // } 
///////commande_produit//////
public function edit2($id)
{
    $user= User::all();
    $produit = Produit::all();
    $fournisseur = Fournisseur::all();
    $ligne_commande_produit = Ligne_commande_produit::all();
    return view ('commande_produit',compact('produit','fournisseur','commande_produit','user'));
}
public function index2()
{
    $user= User::all();
    $produit = Produit::all();
    $fournisseur = Fournisseur::all();
    $ligne_commande_produit = Ligne_commande_produit::all();
    return view('commande_produit',compact('produit','ligne_commande_produit','fournisseur','user'));
}
public function store1(Request $request)
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
    $save = $ligne_commande_produit->save();
    $userSchema = User::first();
    if($save){
        $ligne_commande_produit['message']="Nouvelle commande effectuée";
        $userSchema->notify(new NotificationCommande($ligne_commande_produit));
        return back()->with('success','commande enregistrée avec succès');

    }else{
        return back()->with('fail','une erreur sest produite');

    }   
 }
    
}
