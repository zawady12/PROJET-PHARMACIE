<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fournisseur;
use App\Models\Retour;
use App\Models\Produit;
use App\Models\User;
use App\Models\Bon_livraison;
use App\Notifications\NotificationLivraison;
use App\Notifications\NotificationRetour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Bon_livraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *"
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $bon_livraison = Bon_livraison::all();
        return view('bon_livraison', compact('fournisseur', 'produit', 'bon_livraison'));
    }
    public function tab()
    {
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $tabbon_livraison = Bon_livraison::all();
        $currentTime = Carbon::now()->format("Y-m-d");
        $date = "09000000";
        $data = "09000000";
        return view('tabbon_livraison', compact('fournisseur', 'produit', 'tabbon_livraison', 'currentTime', 'date', 'data'));
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
            'produit_id' => 'required',
            'num_livraison' => ['required', 'unique:bon_livraisons'],
            'qté_liv' => 'required',
            'prix_fournisseur' => 'required',
            'montant_initial' => 'required',
            'fournisseur_id' => 'required',
            'date_liv' => 'required',
            'heure_liv' => 'required',
        ]);

        $bon_livraison = new Bon_livraison;
        $bon_livraison->num_livraison = $request->num_livraison;
        $bon_livraison->produit_id = $request->produit_id;
        $bon_livraison->qté_liv = $request->qté_liv;
        $bon_livraison->prix_fournisseur = $request->prix_fournisseur;
        $bon_livraison->montant_initial = $request->montant_initial;
        $bon_livraison->fournisseur_id = $request->fournisseur_id;
        $bon_livraison->date_liv = $request->date_liv;
        $bon_livraison->heure_liv = $request->heure_liv;

        $save = $bon_livraison->save();
        $userSchema = User::first();
        if ($save) {
                    $bon_livraison['message'] = "Nouvelle livraison effectuée";
                    $userSchema->notify(new NotificationLivraison($bon_livraison));
                    $bon_livraisons = Bon_livraison::get();
                    foreach ($bon_livraisons as $r) {
                        $product = Produit::findOrFail($r->produit_id);
                        } 
                    $option = DB::update('UPDATE produits SET 
                    qnté_stockée = qnté_stockée + ' . $bon_livraison->qté_liv . ' 
                    where id = ?', [$bon_livraison->produit_id]);
                   
                    return back()->with('messages', 'Stock mis à jour');
                }
                else {
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
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $bon_livraison = Bon_livraison::find($id);

        return view('viewbon_liv', compact('fournisseur', 'produit', 'bon_livraison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $bon_livraison = Bon_livraison::find($id);
        return view('editbon_liv', compact('fournisseur', 'produit', 'bon_livraison'));
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
            'produit_id' => 'required',
            'num_livraison' => 'required',
            'qté_liv' => 'required',
            'prix_fournisseur' => 'required',
            'montant_initial' => 'required',
            'fournisseur_id' => 'required',
            'date_liv' => 'required',
            'heure_liv' => 'required',
        ]);
        $bon_livraison = Bon_livraison::find($request->id);
        $bon_livraison->num_livraison = $request->num_livraison;
        $bon_livraison->produit_id = $request->produit_id;
        $bon_livraison->qté_liv = $request->qté_liv;
        $bon_livraison->prix_fournisseur = $request->prix_fournisseur;
        $bon_livraison->montant_initial = $request->montant_initial;
        $bon_livraison->fournisseur_id = $request->fournisseur_id;
        $bon_livraison->date_liv = $request->date_liv;
        $bon_livraison->heure_liv = $request->heure_liv;
        $save = $bon_livraison->save();
        $userSchema = User::first();
        if ($save) {
            $bon_livraison['message'] = "Livraison editée";
            $userSchema->notify(new NotificationLivraison($bon_livraison));
            $bon_livraisons = Bon_livraison::get();
                    foreach ($bon_livraisons as $r) {
                        $product = Produit::findOrFail($r->produit_id);
                        } 
                    $option = DB::update('UPDATE produits SET 
                    qnté_stockée = qnté_stockée + ' . $bon_livraison->qté_liv . ' 
                    where id = ?', [$bon_livraison->produit_id]);
                   
                    return back()->with('messages', 'Stock mis à jour');
            return back()->with('success', '');
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
        $bon_livraison = Bon_livraison::find($request->id);
        $delete = $bon_livraison->delete();
        $userSchema = User::first();
        if ($delete) {
            $bon_livraison['message'] = "Livraison supprimée";
            $userSchema->notify(new NotificationLivraison($bon_livraison));
            return back();
        }
    }






    ///////retour/////////

    public function tab2()
    {
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $tabbon_livraison = Bon_livraison::all();
        $retour = Retour::all();
        return view('tabretour', compact('fournisseur', 'produit', 'tabbon_livraison', 'retour'));
    }

    public function edit2($id)
    {
        $fournisseur = Fournisseur::all();
        $produit = Produit::all();
        $retour = Retour::find($id);
        return view('retour', compact('fournisseur', 'produit', 'retour'));
    }
    public function store2(Request $request)
    {
        $request->validate([
            'num_livraison' => ['required', 'unique:retours'],
            'qté_liv' => 'required',
            'montant_initial' => 'required',
            'qté_retour' => 'required',
            'montant_retour' => 'required',
            'prix_fournisseur' => 'required',
            'fournisseur_id' => 'required',
            'date_liv' => 'required',
            'motif' => 'required',

        ]);
        $bon_livraison = new Retour;
        $bon_livraison->num_livraison = $request->num_livraison;
        $bon_livraison->qté_liv = $request->qté_liv;
        $bon_livraison->montant_initial = $request->montant_initial;
        $bon_livraison->qté_retour = $request->qté_retour;
        $bon_livraison->montant_retour = $request->montant_retour;
        $bon_livraison->prix_fournisseur = $request->prix_fournisseur;
        $bon_livraison->fournisseur_id = $request->fournisseur_id;
        $bon_livraison->date_liv = $request->date_liv;
        $bon_livraison->motif = $request->motif;
        
        $save = $bon_livraison->save();
        $userSchema = User::first();
        if ($save) {
            $bon_livraison['message'] = "Nouveau retour effectué";
                    $userSchema->notify(new NotificationRetour($bon_livraison));

        // 
           
        //     
        //     $bon_livraison= Bon_livraison::find($request->id);
        //     $bon_livraisons = Bon_livraison::get();
        //     foreach ($bon_livraisons as $r) {
        //         $bon = Bon_livraison::findOrFail($r->num_livraison);
        //         } 
        //     $option = DB::update('UPDATE bon_livraisons SET 
        //     qté_liv = qté_liv - ' . $bon_livraison->qté_retour . ' 
        //     where num_livraison = ?', [$bon_livraison->num_livraison]);
        //     foreach ($bon as $p) {
        //         $p->save($option);
        //     }
            return back()->with('messages', 'Stock mis à jour');
        }
        else {
            return back()->with('fail', 'une erreur sest produite');
        }
    }
}
// mysqli_query($pdo,$requete3) or die(mysqli_error($pdo));

            // extract($_POST);
            //     {
            //     $req = $mysqli->prepare('UPDATE produits SET qnté_stockée = qnté_stockée + $bon_livraison->qté_liv
            //      WHERE produits.id= .$bon_livraison[produit_id].');
            //     foreach($_POST['qnté_stockée'] as $key => $value) {
            //     $req->execute(array(
            //     'qnté_stockée'=>$value,
            //     ));
            //     $req->closeCursor();
            //     }
            // }