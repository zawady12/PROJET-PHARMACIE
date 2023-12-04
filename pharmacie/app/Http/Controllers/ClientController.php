<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Notifications\NotificationClient;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = Client::all();
        return view('client', compact('client'));
    }

    public function tab()
    {

        $tabclient = Client::all();
        return view('tabclient', compact('tabclient'));
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

        $client = new Client;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->tel = $request->tel;
        $client->adresse = $request->adresse;
        $save = $client->save();
        $userSchema = User::first();
        if ($save) {
            $client['message']="Nouveau client ajouté";
            $userSchema->notify(new NotificationClient($client));
            
            return back()->with('success', 'client enregistré avec succès');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }

        // return redirect()->route('getclient')->with('success','client enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $client = Client::find($id);

        return view('viewclient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $client = Client::find($id);
        return view('editclient', compact('client'));
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
        $client = Client::find($request->id);

        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->tel = $request->tel;
        $client->adresse = $request->adresse;
        $save=$client->save();
        $userSchema = User::first();

        if ($save) {
            
            $client['message']='client modifié';
            $userSchema->notify(new NotificationClient($client));
            
            return back()->with('success');
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
        $client = Client::find($request->id);
        $delete=$client->delete();
        $userSchema = User::first();
        if ($delete) {
            
            $client['message']='client supprimé';
            $userSchema->notify(new NotificationClient($client));
            
            return back()->with('success');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }    }
}
