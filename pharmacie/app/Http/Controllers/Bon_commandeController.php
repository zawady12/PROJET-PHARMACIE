<?php

namespace App\Http\Controllers;
use App\Models\Livraison;
use App\Models\Commande;
use App\Models\Bon_commande;
use Illuminate\Http\Request;

class Bon_commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livraison = Livraison::all();
        $commande = Commande::all();
        $bon_commande = Bon_commande::all();
        return view('bon_commande',compact('livraison','commande','bon_commande'));
    }
    public function tab()
    {
        $livraison= Livraison::all();
        $commande = Commande::all();
        $tabbon_commande = Bon_commande::all();
        return view('tabbon_commande',compact('livraison','commande','tabbon_commande'));
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
            'qté_liv' => 'required',
            'commande_id' => 'required',
            'livraison_id' => 'required',
            
        ]);

        $bon_commande = new Bon_commande;
        $bon_commande->qté_liv = $request->qté_liv;
        $bon_commande->commande_id = $request->commande_id;
        $bon_commande->livraison_id = $request->livraison_id;
        $bon_commande->save();

        
        return redirect()->route('getbon_liv')->with('success','Ligne enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $livraison= Livraison::all();
        $commande = Commande::all();
        $bon_commande= Bon_commande::find($id);

        return view ('viewbon_liv',compact('livraison','commande','bon_commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livraison= Livraison::all();
        $commande = Commande::all();
        $bon_commande= Bon_commande::find($id);
        
        return view ('editbon_liv',compact('livraison','commande','bon_commande'));
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
            'qté_liv' => 'required',
            'commande_id' => 'required',
            'livraison_id' => 'required',
            
            
        ]);
        $bon_commande= Bon_commande::find($request->id);

        $bon_commande->qté_liv = $request->qté_liv;
        $bon_commande->commande_id = $request->commande_id;
        $bon_commande->livraison_id = $request->livraison_id;

        $bon_commande->save();
        return redirect('/tabbon_commande')->with('success','Ligne modifiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $bon_commande= Bon_commande::find($request->id);
        $bon_commande->delete();
    
        return back()->with('success','Ligne supprimée');
    }
}
