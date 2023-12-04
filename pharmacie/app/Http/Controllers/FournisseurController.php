<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Notifications\NotificationFournisseur;
use App\Models\User;



class FournisseurController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $fournisseur = Fournisseur::all();
        return view('fournisseur',compact('fournisseur'));
    }

    public function tab()
    {
    
        $tabfournisseur = Fournisseur::all();
        return view('tabfournisseur',compact('tabfournisseur'));
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

            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required|regex:/(76)/|min:9|max:13',
            'adresse' => 'required',
    
        ]);

        $fournisseur = new Fournisseur;
        $fournisseur->nom = $request->nom;
        $fournisseur->prenom = $request->prenom;
        $fournisseur->tel = $request->tel;
        $fournisseur->adresse = $request->adresse;
        $save = $fournisseur->save();
        $userSchema = User::first();

        if($save){
            $fournisseur['message']='Nouveau fournisseur ajouté';
            $userSchema->notify(new Notificationfournisseur($fournisseur));
            return back()->with('success','Fournisseur enregistré avec succès');

        }else{
            return back()->with('fail','une erreur sest produite');

        }
        
        // return redirect()->route('getfournisseur')->with('success','fournisseur enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
    
        $fournisseur= Fournisseur::find($id);

        return view ('viewfournisseur',compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur= Fournisseur::find($id);
        return view ('editfournisseur',compact('fournisseur'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required|regex:/(76)/|min:9|max:13',
            'adresse' => 'required',
            
        ]);
        $fournisseur= Fournisseur::find($request->id);

        $fournisseur->nom = $request->nom;
        $fournisseur->prenom = $request->prenom;
        $fournisseur->tel = $request->tel;
        $fournisseur->adresse = $request->adresse;

       $save= $fournisseur->save();
       $userSchema = User::first();

       if($save){
           $fournisseur['message']='Fournisseur modifié';
           $userSchema->notify(new Notificationfournisseur($fournisseur));
           return back()->with('success','Fournisseur enregistré avec succès');

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
        $fournisseur= Fournisseur::find($request->id);
        $delete=$fournisseur->delete();
        $userSchema = User::first();
        if ($delete) {
            
            $fournisseur['message']='Fournisseur supprimé';
            $userSchema->notify(new Notificationfournisseur($fournisseur));
            
            return back()->with('success');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }    }
    }
    

