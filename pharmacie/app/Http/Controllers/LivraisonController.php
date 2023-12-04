<?php

namespace App\Http\Controllers;
use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $livraison = Livraison::all();
        return view('livraison',compact('livraison'));
    }

    /*public function tab()
    {
    
        $tablivraison = livraison::all();
        return view('tablivraison',compact('tablivraison'));
    }*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'num_livraison' => 'required',
            'description' => 'required',
    
        ]);

        $livraison = new Livraison;
        $livraison->num_livraison = $request->num_livraison;
        $livraison->description = $request->description;
        $livraison->save();

        
        return redirect()->route('getlivraison')->with('success','Livraison enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
    
        $livraison= Livraison::find($id);

        return view ('viewlivraison',compact('livraison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $livraison= Livraison::find($id);
        
        return view ('editlivraison',compact('livraison'));
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

            'num_livraison' => 'required',
            'description' => 'required',
            
        ]);
        $livraison= Livraison::find($request->id);

        $livraison->num_livraison = $request->num_livraison;
        $livraison->description = $request->description;

        $livraison->save();
        return redirect('/tablivraison')->with('success','Livraison modifiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $livraison= Livraison::find($request->id);
        $livraison->delete();
    
        return back()->with('success','Livraison supprimée');
    }
}
