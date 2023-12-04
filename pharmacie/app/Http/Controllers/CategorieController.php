<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Notificationventecategorie;

class CategorieController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $categorie = Categorie::all();
        return view('categorie',compact('categorie'));
    }

    public function tab()
    {
    
        $tabcategorie = Categorie::all();
        return view('tabcategorie',compact('tabcategorie'));
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

            'type' => 'required',
    
        ]);

        $categorie = new Categorie;
        $categorie->type = $request->type;
        $save = $categorie->save();
        $userSchema = User::first();
        if ($save) {
            $categorie['message'] = "Nouvelle categorie ajouté";
            $userSchema->notify(new Notificationventecategorie($categorie));
            return back()->with('success', 'categorie enregistré avec succès');
        } else {
            return back()->with('fail', 'une erreur sest produite');
        }
        
        // return redirect()->route('getcategorie')->with('success','categorie enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
    
        $categorie= Categorie::find($id);

        return view ('viewcategorie',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categorie= Categorie::find($id);
        return view ('editcategorie',compact('categorie'));
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
            'type' => 'required',
            
        ]);
        $categorie= Categorie::find($request->id);
        $categorie->type = $request->type;
       $save= $categorie->save();
       $userSchema = User::first();
        if ($save) {
            $categorie['message'] = "Categorie editée";
            $userSchema->notify(new Notificationventecategorie($categorie));
        return back();
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
        $categorie= Categorie::find($request->id);
        $delete=$categorie->delete();
        $userSchema = User::first();
        if ($delete) {
            $categorie['message'] = "Categorie suprimée";
            $userSchema->notify(new Notificationventecategorie($categorie));
        return back();
        }
    }
    


}
