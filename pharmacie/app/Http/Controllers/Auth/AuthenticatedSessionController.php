<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\NotificationStock;
use App\Models\Produit;
use App\Notifications\NotificationPeremption;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        $request->session()->regenerate();

        $user = Auth::User();
        $name = $user->name;
        $email = $user->email;
        $dt =  Carbon::now();
        $todayDate=$dt->toDayDateTimeString();
        $activitylog=[
            'name' => $name,
            'email' => $email,
            'description' => 'Connexion',
            'date_time' => $todayDate,
            
        ];
        DB::table('activites')->insert($activitylog);

    //    $produit = DB::select('select dci, sum(qnté_stockée) as x from produits group by dci');
    //    $userSchema = User::first();
    //     foreach ($produit as $p) {
    //         if ($p->x <= 10) {
    //             $produit['nom'] = $p -> dci;
    //             $produit['id'] = $p -> x;
    //             $produit['message'] = "Produit en rupture de stock";
    //             $userSchema->notify(new NotificationStock($produit));
    //         }
    //     };

    //     $peremption = DB::select('select id,dci,date_peremption as z from produits');
    //     $currentTime = Carbon::now()->format("Y-m-d");
    //     $date = "07000000";
    //     foreach ($peremption as $pe) {
    //         if (strtotime($pe->z) - strtotime($currentTime) <= $date) {
    //             $peremption['nom'] = $pe -> dci;
    //             $peremption['id'] = $pe -> z;
    //             $peremption['message'] = "Produits en voie de péremption";
    //             $userSchema->notify(new NotificationPeremption($peremption));
    //         }
    //     };

        return redirect()->intended(RouteServiceProvider::HOME);
        
    }
    protected function redirect()
{
   
    return redirect(RouteServiceProvider::HOME);;
}
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user = Auth::User();
        $name = $user->name;
        $email = $user->email;
        $dt =   Carbon::now();
        $todayDate=$dt->toDayDateTimeString();
        $activitylog=[
            'name' => $name,
            'email' => $email,
            'description' => 'Deconnexion',
            'date_time' => $todayDate,
            
        ];
        Auth::guard('web')->logout();
        DB::table('activites')->insert($activitylog);
        return redirect('login');



    }
}
