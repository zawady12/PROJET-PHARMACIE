<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Personnel;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Session;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $user = User::all();
        return view('personnel', compact('role', 'user'));
    }

    public function index2()
    {

        return view('log_in');
    }

    public function tab()
    {
        $role = Role::all();
        $tabpersonnel = User::all();
        return view('tabpersonnel', compact('role', 'tabpersonnel'));
    }

    public function tabrole()
    {
        $role = Role::all();
        return view('tabrole', compact('role'));
    }

    public function activites()
    {
        $activitylog = DB::table('activites')->get();
        return view('activites', compact('activitylog'));
    }
    public function profil()
    {
        $profil = User::all();
        return view('profil', compact('profil'));
    }

    public function HA()
    {
        $ha = User::all();
        $hp = Client::all();
        $hf = Fournisseur::all();
        $hc = Categorie::all();
        $hr = Role::all();
        return view('HA', compact('ha', 'hp', 'hf', 'hc', 'hr'));
    }
    public function HM()
    {
        $ha = User::all();
        $hp = Client::all();
        $hf = Fournisseur::all();
        $hc = Categorie::all();
        $hr = Role::all();
        return view('HM', compact('ha', 'hp', 'hf', 'hc', 'hr'));
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
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'min:9', 'max:13'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'string', 'max:255'],

        ]);

        $personnel = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,

        ]);
        $save = $personnel->save();
        if ($save) {
            return back()->with('success', 'personnel enregistré avec succès');
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
        $role = Role::all();
        $personnel = User::find($id);

        return view('viewpersonnel', compact('role', 'personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $personnel = User::find($id);

        return view('editpersonnel', compact('role', 'personnel'));
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
        $personnel = User::find($request->id);
        $personnel->name = $request->name;
        $personnel->prenom = $request->prenom;
        $personnel->tel = $request->tel;
        $personnel->adresse = $request->adresse;
        $personnel->email = $request->email;
        $personnel->role_id = $request->role_id;

        $save = $personnel->save();
        if ($save) {
            return back()->with('success', 'personnel edité avec succès');
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
        $personnel = User::find($request->id);
        $personnel->delete();

        return back()->with('success', 'personnel supprimé');
    }
    public function getUser($id)
    {
        $profil = User::all();
        $data = User::find($id);
        return view('profil', compact('data','profil'));
    }
}





/*public function store2(Request $request)
{
    $request->validate([

        'email' => 'required|email',
        'pass' => 'required|min:8|max:12',
    ]);
    $userinfo= Personnel::where('email','=', $request->email)->first();
    if(!$userinfo)
    {
        return back()->with('fail','nous ne reconnaissons pas votre email');
    }
    else{
        if(Hash::check($request->pass, $userinfo->pass))
        {
            $request->session()->put('loggedUser',$userinfo->id);
            return redirect('vue');
        }
        else{
            return back()->with('fail','mot de passe incorrect');
        }
    }
    
}
/*public function vue(){
    if(Session::has('loggedUser')){
        $data= Personnel::where('id','=', session::get('loggedUser'))->first();
     }
     return view ('vue',compact('data'));
    }*/


/*public function log_out(){
$data = array();
if(Session::has('loggedUser')){
Session::pull('loggedUser');
return redirect('log_in');
 }
}*/
