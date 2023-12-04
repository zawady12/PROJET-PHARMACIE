<?php

namespace App\Http\Controllers;
use App\Models\Retour;
use App\Models\Bon_livraison;
use Illuminate\Http\Request;

class RetourController extends Controller
{
    public function index()
    {
        $retour = Retour::all();
        return view('retour',compact('retour'));
    }
    public function tab()
    {
        $retour= Retour::all();
        //$user = DB::select('select *  from retours where id = ? ', [1]);
        return view('tabretour',compact('retour'));
    }
    public function edit($id)
    {
        $retour = retour::all();
        $bon_livraison= Bon_livraison::find($id);
        
        return view ('editbon_liv',compact('fournisseur','retour','bon_livraison'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'retour_id' => 'required',
            'num_livraison' => ['required','unique:retours'],
            'qté_liv' => 'required',
            'fournisseur_id' => 'required',
            'date_liv' => 'required',
            'heure_liv' => 'required',
        ]);

        $retour = new Retour;
        $retour->num_livraison = $request->num_livraison;
        $retour->qté_liv = $request->qté_liv;
        $retour->montant = $request->montant ;
        $retour->fournisseur_id = $request->fournisseur_id;
        $save=$retour->save();
        if($save){
            return back()->with('success','');

        }else{
            return back()->with('fail','une erreur sest retoure');
        }
        }
}
