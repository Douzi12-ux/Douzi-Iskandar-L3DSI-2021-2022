<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChefarchiveController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});
Route::get('/contact', function () {
    return view('client.contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admin/users', UserController::class);
Route::get('client', [UserController::class,'index1'])->name('client');
/*Fournisseur*/
Route::get('fournisseur', [FournisseurController::class,'index'])->name('fournisseur');
Route::get('add_fournisseur', [FournisseurController::class,'create']);
Route::post('add_fournisseur', [FournisseurController::class,'store']);
Route::get('edit_fournisseur/{id}', [FournisseurController::class,'edit'])->name('fournisseuredit');
Route::put('edit_fournisseur/{id}', [FournisseurController::class,'update'])->name('fournisseurupdate');
Route::delete('fournisseur/{id}', [FournisseurController::class,'destroy'])->name('supp');

/***************Admin********************/
/*Archivage */
Route::get('archiveeee', [ArchiveController::class,'index'])->name('toutarchive');
Route::get('add_fichierr', [ArchiveController::class,'create']);
Route::post('add_fichierr', [ArchiveController::class,'store'])->name('addfilee');
Route::delete('fichierrrr/{id}', [ArchiveController::class,'destroy2'])->name('suppfileefile');

/*departement*/
Route::get('departement', [DepartementController::class,'index'])->name('departement');
Route::get('add_depar', [DepartementController::class,'create']);
Route::post('add_departement', [DepartementController::class,'store'])->name('adddepartement');
Route::get('edit_departement/{id}', [DepartementController::class,'edit'])->name('departementedit');
Route::put('edit_departementt/{id}', [DepartementController::class,'update'])->name('departementupdate');
Route::delete('departement/{id}', [DepartementController::class,'destroy']);
/*commande*/
Route::get('commandee', [CommandeController::class,'index1'])->name('commandee');
Route::get('commandes', [CommandeController::class,'index2'])->name('commandes');
Route::get('commandedetailadmin/{id}', [CommandeController::class,'showdetailadmin'])->name('commandedetailadmin');
Route::get('admincommandeshow/{id}', [CommandeController::class,'showadminfact'])->name('admincommandeshow');
//Route::get('showcommande/{id}', [CommandeController::class,'show']);
Route::patch('confirmecommande/{id}', [CommandeController::class,'confirmer'])->name('confirmecommande');
Route::patch('refusercommande/{id}', [CommandeController::class,'refuser'])->name('refusercommande');
/*Reclamation**/
Route::get('reclamationn', [ReclamationController::class,'index2'])->name('reclamatio');
Route::get('add_reclamationadmin', [ReclamationController::class,'create1'])->name('recl');
Route::post('add_reclamationadmin', [ReclamationController::class,'store1']);
Route::get('reclamationshoww/{id}', [ReclamationController::class,'showReclaAdmin'])->name('showrecla');
Route::delete('reclamationnnn/{id}',[ReclamationController::class,'destroy'])->name('delqdqdqdqd');
/*Archivage **Chef**/
Route::get('chefarchive', [ChefarchiveController::class,'index'])->name('chefarchive');
Route::get('add_chefarchive', [ChefarchiveController::class,'create']);
Route::post('add_chefarchive', [ChefarchiveController::class,'store'])->name('addchefarchive');

/*Client*/
Route::get('client_fournisseur', [FournisseurController::class,'index1'])->name('clientfournisseur');
/****/
/*Stock*/
Route::get('stock', [StockController::class,'index'])->name('stock');
Route::get('add_stock', [StockController::class,'create']);
Route::post('add_stock', [StockController::class,'store']);
Route::get('edit_stock/{id}', [StockController::class,'edit'])->name('stockedit');
Route::put('edit_stock/{id}', [StockController::class,'update'])->name('ustockedit');
Route::delete('stock/{id}',[StockController::class,'destroy'])->name('delete');
Route::get('/people/simple', [StockController::class,'simple'])->name('simple_search');
/*commande*/
Route::get('commande', [CommandeController::class,'index'])->name('commande');
Route::get('commande/{id}', [CommandeController::class,'show'])->name('commandeshow');
Route::get('commandedetail/{id}', [CommandeController::class,'showdetail'])->name('commandedetail');
Route::get('add_commande', [CommandeController::class,'create']);
Route::post('add_commande', [CommandeController::class,'store'])->name('addcommande');
//Route::get('edit_stock/{id}', [StockController::class,'edit'])->name('stockedit');
//Route::put('edit_stock/{id}', [StockController::class,'update'])->name('ustockedit');
Route::delete('commande/{id}',[CommandeController::class,'destroy'])->name('deletecommande');

/*chef departement*/
Route::get('reclamation', [ReclamationController::class,'index7'])->name('reclamation');
Route::get('add_reclamationn', [ReclamationController::class,'create']);
Route::post('add_reclamationn', [ReclamationController::class,'store']);
Route::get('reclamationshow/{id}', [ReclamationController::class,'show1'])->name('showchef');
Route::get('edit_reclamtion/{id}', [ReclamationController::class,'edit'])->name('reclamtionedit');
Route::put('edit_reclamation/{id}', [ReclamationController::class,'update'])->name('modifierreclamation');
Route::delete('reclamation/{id}',[ReclamationController::class,'destroy2'])->name('saupprimerreclamation');
Route::delete('suppparchivee/{id}',[ArchiveController::class,'destroy1'])->name('supparchivee');
/*Ingenieur*/
Route::get('conreclamation', [ReclamationController::class,'index1'])->name('conreclamation');
Route::get('reclamation/{id}', [ReclamationController::class,'show'])->name('reclamationshow');
Route::patch('confirmereclamation/{id}', [ReclamationController::class,'confirmer'])->name('confirmereclamation');
Route::patch('refuserreclamation/{id}', [ReclamationController::class,'refuser'])->name('refuserreclamation');
Route::get('reclamationconfirmer', [ReclamationController::class,'index3'])->name('reclamationconfirmer');
Route::get('reclamationrefuser', [ReclamationController::class,'index4'])->name('reclamationrefuser');
Route::get('reclamationencours', [ReclamationController::class,'index5'])->name('reclamationencours');
Route::get('/reclamationsearch', [ReclamationController::class,'simple'])->name('search');
Route::get('archive', [ArchiveController::class,'indexxx'])->name('archiveingenieur');
Route::get('add_fichier_ing', [ArchiveController::class,'create1']);
Route::post('add_fichier_ing', [ArchiveController::class,'store1'])->name('addfile');
Route::delete('fichier/{id}', [ArchiveController::class,'destroy'])->name('suppfile');
Route::delete('fichier/{id}', [ArchiveController::class,'destroy3'])->name('suppfileee');
