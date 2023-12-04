<?php

namespace App\Http\Controllers;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Ligne_vente_client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\Notificationventeclient;

class Ligne_vente_clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vente = Vente::all();
        $client = Client::all();
        $ligne_vente_client = Ligne_vente_client::all();
        return view('ligne_vente_client',compact('vente','client','ligne_vente_client'));
    }
    public function tab()
    {
        $vente = Vente::all();
        $montant= DB::select('select montant from ventes,ligne_vente_clients where ventes.id=ligne_vente_clients.vente_id');
        $client = Client::all();
        $tabligne_vente_client = Ligne_vente_client::all();
        return view('tabligne_vente_client',compact('vente','client','tabligne_vente_client','montant'));
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
            'vente_id' => ['required', 'unique:ligne_vente_clients'],
            'client_id' => 'required',
        ]);

        $ligne_vente_client = new Ligne_vente_client;
        $ligne_vente_client->vente_id = $request->vente_id;
        $ligne_vente_client->client_id = $request->client_id;
        $save=$ligne_vente_client->save();
        $userSchema = User::first();
        if ($save) {
            $ligne_vente_client['message']="Vente afféctée à un client";
            $userSchema->notify(new Notificationventeclient($ligne_vente_client));
            return back()->with('success', 'vente enregistré avec succès');
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
        $vente= Vente::all();
        $client = Client::all();
        $ligne_vente_client= Ligne_vente_client::find($id);
        return view ('viewligne_vente_cli',compact('vente','client','ligne_vente_client'));
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
        $client = Client::all();
        $ligne_vente_client= Ligne_vente_client::find($id);
        
        return view ('editligne_vente_cli',compact('vente','client','ligne_vente_client'));
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
            'vente_id' => 'required',
            'client_id' => 'required',
        ]);
        $ligne_vente_client= Ligne_vente_client::find($request->id);        
        $ligne_vente_client->vente_id = $request->vente_id;
        $ligne_vente_client->client_id = $request->client_id;
        $save=$ligne_vente_client->save();
        $userSchema = User::first();
        if ($save) {
            $vente['message']="Vente client mise à jour ";
            $userSchema->notify(new Notificationventeclient($vente));
            return back()->with('success','Ligne supprimée');

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
        $ligne_vente_client= Ligne_vente_client::find($request->id);
        $delete=$ligne_vente_client->delete();
        $userSchema = User::first();
        if ($delete) {
            $vente['message']="Vente supprimée ";
            $userSchema->notify(new Notificationventeclient($vente));
            return back()->with('success','Ligne supprimée');

        }
    }
}
