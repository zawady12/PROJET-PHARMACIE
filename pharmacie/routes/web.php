<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',  [DashController::class, 'index2'])->middleware(['auth'])->name('dashboard');
//Route::get('/dashboard',  [DashController::class, 'stock'])->middleware(['auth']);

require __DIR__ . '/auth.php';

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::group(['middleware' => ['auth']], function () {

    //------------vue-------------
    Route::get('/dashboard1', [DashController::class, 'index'])->name('getdash');
    Route::get('/vue', [DashController::class, 'index1'])->name('getdall');
    Route::get('/sidebar', [DashController::class, 'index3'])->name('sidebar');
    Route::get('/index', [DashController::class, 'index4'])->name('index');



    //------------categorie-------------
    Route::get('/categorie', [CategorieController::class, 'index'])->name('getcategorie');
    Route::post('/categorie', [CategorieController::class, 'store'])->name('postcategorie');
    Route::get('/editcategorie/{id}', [CategorieController::class, 'edit']);
    Route::post('/updatecategorie', [CategorieController::class, 'update']);
    Route::get('/deletecategorie/{id}', [CategorieController::class, 'destroy']);
    Route::get('/tabcategorie', [CategorieController::class, 'tab'])->name('enregistrerr.categorie');
    Route::get('/editcategorie/{id}', [CategorieController::class, 'edit']);
    Route::get('/viewcategorie/{id}', [CategorieController::class, 'view']);

    //------------client-------------
    Route::get('/client', [ClientController::class, 'index'])->name('getclient');
    Route::post('/client', [ClientController::class, 'store'])->name('postclient');
    Route::get('/editclient/{id}', [ClientController::class, 'edit']);
    Route::post('/updateclient', [ClientController::class, 'update']);
    Route::get('/deleteclient/{id}', [ClientController::class, 'destroy']);
    Route::get('/tabclient', [ClientController::class, 'tab'])->name('enregistrerr.client');
    Route::get('/editclient/{id}', [ClientController::class, 'edit']);
    Route::get('/viewclient/{id}', [ClientController::class, 'view']);


    //------------personnel-------------
    Route::get('/personnel', [PersonnelController::class, 'index']);
    Route::post('/personnel', [PersonnelController::class, 'store'])->name('postpersonnel');
    /*Route::get('/log_in', [PersonnelController::class, 'index2'])->name('getlog_in');
Route::post('/log_in', [PersonnelController::class, 'store2'])->name('postlog_in');
//Route::get('/log_out', [PerelController::class, 'log_out']);
Route::get('/viewpersonnel/{id}', [PersonnelController::class, 'view']);*/
    Route::get('/editpersonnel/{id}', [PersonnelController::class, 'edit']);
    Route::post('/updatepersonnel', [PersonnelController::class, 'update']);
    Route::get('/deletepersonnel/{id}', [PersonnelController::class, 'destroy']);
    Route::get('/tabpersonnel', [PersonnelController::class, 'tab'])->name('enregistrerr.personnel');

    //------------AUTRES-------------
    Route::get('/tabrole', [PersonnelController::class, 'tabrole']);
    Route::get('/activites', [PersonnelController::class, 'activites']);
    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
    Route::get('notification', [NotificationController::class, 'index']);
    Route::get('tabnotification', [NotificationController::class, 'index1']);
    Route::get('markasread', function () {
        auth()->user()->unReadNotifications->markAsRead();
        return redirect()->back();
    })->name('markRead');
    Route::get('/profil', [PersonnelController::class, 'profil']);
    Route::get('/HA', [PersonnelController::class, 'HA']);
    Route::get('/HM', [ClientController::class, 'store']);



    //------------fournisseur-------------
    Route::get('/fournisseur', [FournisseurController::class, 'index'])->name('getfournisseur');
    Route::post('/fournisseur', [FournisseurController::class, 'store'])->name('postfournisseur');
    Route::get('/editfournisseur/{id}', [FournisseurController::class, 'edit']);
    Route::post('/updatefournisseur', [FournisseurController::class, 'update']);
    Route::get('/deletefournisseur/{id}', [FournisseurController::class, 'destroy']);
    Route::get('/tabfournisseur', [FournisseurController::class, 'tab'])->name('enregistrerr.fournisseur');
    Route::get('/editfournisseur/{id}', [FournisseurController::class, 'edit']);
    Route::get('/viewfournisseur/{id}', [FournisseurController::class, 'view']);

    //------------fournisseur-------------
    Route::get('/produit', [ProduitController::class, 'index'])->name('getproduit');
    Route::post('/produit', [ProduitController::class, 'store'])->name('postproduit');
    Route::get('/editproduit/{id}', [ProduitController::class, 'edit']);
    Route::post('/updateproduit', [ProduitController::class, 'update']);
    Route::get('/deleteproduit/{id}', [ProduitController::class, 'destroy']);
    Route::get('/tabproduit', [ProduitController::class, 'tab'])->name('enregistrerr.produit');
    Route::get('/editproduit/{id}', [ProduitController::class, 'edit']);
    Route::get('/viewproduit/{id}', [ProduitController::class, 'view']);
    Route::get('/tabalerte', [AlerteController::class, 'index']);
    Route::get('/tabperemption', [AlerteController::class, 'index2']);


    //Route::get('/tabproduit', [ProduitController::class, 'stock']);

    //------------commande-------------
    Route::get('/commande', [CommandeController::class, 'index'])->name('getcommande');
    Route::post('/commande', [CommandeController::class, 'store'])->name('postcommande');
    Route::get('/editcommande/{id}', [CommandeController::class, 'edit']);
    Route::post('/updatecommande', [CommandeController::class, 'update']);
    Route::get('/deletecommande/{id}', [CommandeController::class, 'destroy']);
    Route::get('/tabcommande', [CommandeController::class, 'tab'])->name('enregistrerr.commande');
    Route::get('/viewcommande/{id}', [CommandeController::class, 'view']);

    //------------bon_livraison-------------
    Route::get('/bon_livraison', [Bon_livraisonController::class, 'index'])->name('getbon_livraison');
    Route::post('/bon_livraison', [Bon_livraisonController::class, 'store'])->name('postbon_livraison');
    Route::get('/editbon_livraison/{id}', [Bon_livraisonController::class, 'edit']);
    Route::post('/updatebon_livraison', [Bon_livraisonController::class, 'update']);
    Route::get('/deletebon_livraison/{id}', [Bon_livraisonController::class, 'destroy']);
    Route::get('/tabbon_livraison', [Bon_livraisonController::class, 'tab'])->name('enregistrerr.bon_livraison');
    Route::get('/viewbon_livraison/{id}', [Bon_livraisonController::class, 'view']);

    //------------retour-------------
    Route::get('/retourbon_livraison/{id}', [Bon_livraisonController::class, 'edit2']);
    Route::post('/retour', [Bon_livraisonController::class, 'store2'])->name('postretour');
    Route::get('/tabretour', [Bon_livraisonController::class, 'tab2']);
    //------------commande_produit-------------
    Route::get('/commande_produit', [CommandeController::class, 'index2'])->name('getcom');
    Route::get('/editcommande_produit/{id}', [CommandeController::class, 'edit2']);
    Route::post('/commande_produit', [CommandeController::class, 'store1'])->name('post_commande_produit');

    //------------ligne_commande_produit-------------
    Route::get('/ligne_commande_produit', [Ligne_commande_produitController::class, 'index'])->name('getligne_commande_produit');
    Route::post('/ligne_commande_produit', [Ligne_commande_produitController::class, 'store'])->name('postligne_commande_produit');
    Route::get('/editligne_commande_produit/{id}', [Ligne_commande_produitController::class, 'edit']);
    Route::post('/updateligne_commande_produit', [Ligne_commande_produitController::class, 'update']);
    Route::get('/deleteligne_commande_produit/{id}', [Ligne_commande_produitController::class, 'destroy']);
    Route::get('/tabligne_commande_produit', [Ligne_commande_produitController::class, 'tab'])->name('enregistrerr.ligne_commande_produit');
    Route::get('/viewligne_commande_produit/{id}', [Ligne_commande_produitController::class, 'view']);


    Route::get('/vente', [VenteController::class, 'index'])->name('getvente');
    Route::post('/vente', [VenteController::class, 'store'])->name('postvente');
    Route::get('/editvente/{id}', [VenteController::class, 'edit']);
    Route::post('/updatevente', [VenteController::class, 'update']);
    Route::get('/deletevente/{id}', [VenteController::class, 'destroy']);
    Route::get('/tabvente', [VenteController::class, 'tab'])->name('enregistrerr.vente');
    Route::get('/editvente/{id}', [VenteController::class, 'edit']);
    Route::get('/viewvente/{id}', [VenteController::class, 'view']);


    //------------ligne_vente_client-------------
    Route::get('/ligne_vente_client', [Ligne_vente_clientController::class, 'index'])->name('getligne_vente_client');
    Route::post('/ligne_vente_client', [Ligne_vente_clientController::class, 'store'])->name('postligne_vente_client');
    Route::get('/editligne_vente_client/{id}', [Ligne_vente_clientController::class, 'edit']);
    Route::post('/updateligne_vente_client', [Ligne_vente_clientController::class, 'update']);
    Route::get('/deleteligne_vente_client/{id}', [Ligne_vente_clientController::class, 'destroy']);
    Route::get('/tabligne_vente_client', [Ligne_vente_clientController::class, 'tab'])->name('enregistrerr.ligne_vente_client');
    Route::get('/editligne_vente_client/{id}', [Ligne_vente_clientController::class, 'edit']);
    Route::get('/viewligne_vente_client/{id}', [Ligne_vente_clientController::class, 'view']);
    Route::get('/historiquevente', [AlerteController::class, 'index3']);

});
