<?php

namespace App\Http\Controllers;
use App\Models\Vente;
use App\Models\Produit;
use App\Models\Ligne_vente;
use Illuminate\Http\Request;

class Ligne_venteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vente = Vente::all();
        $produit = Produit::all();
        $ligne_vente = Ligne_vente::all();
        return view('ligne_vente',compact('vente','produit','ligne_vente'));
    }
    public function tab()
    {
        $vente= Vente::all();
        $produit = Produit::all();
        $tabligne_vente = Ligne_vente::all();
        return view('tabligne_vente',compact('vente','produit','tabligne_vente'));
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
            'qté_vendu' => 'required',
            'produit_id' => 'required',
            'vente_id' => 'required',
            
        ]);

        $ligne_vente = new Ligne_vente;
        $ligne_vente->qté_vendu = $request->qté_vendu;
        $ligne_vente->produit_id = $request->produit_id;
        $ligne_vente->vente_id = $request->vente_id;
        $ligne_vente->save();
        
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
        $vente= Vente::all();
        $produit = Produit::all();
        $ligne_vente= Ligne_vente::find($id);

        return view ('viewbon_liv',compact('vente','produit','ligne_vente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vente= Vente::all();
        $produit = Produit::all();
        $ligne_vente= Ligne_vente::find($id);
        
        return view ('editbon_liv',compact('vente','produit','ligne_vente'));
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
            'qté_vendu' => 'required',
            'produit_id' => 'required',
            'vente_id' => 'required',
            
            
        ]);
        $ligne_vente= Ligne_vente::find($request->id);

        $ligne_vente->qté_vendu = $request->qté_vendu;
        $ligne_vente->produit_id = $request->produit_id;
        $ligne_vente->vente_id = $request->vente_id;

        $ligne_vente->save();
        return redirect('/tabligne_vente')->with('success','Ligne modifiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $ligne_vente= Ligne_vente::find($request->id);
        $ligne_vente->delete();
    
        return back()->with('success','Ligne supprimée');
    }
}
