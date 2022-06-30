<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/****LogIn Register****/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


/*******Administrateur*************Administrateur*********************Administrateur****************Administrateur***************/
/**Users**/
Route::get('searchusers/{nom}',[UserController::class,'search']);
Route::get('countusers',[UserController::class,'countUsers']);
Route::get('countClient',[UserController::class,'countClient']);
Route::get('user',[UserController::class,'indexAPI']);
Route::get('role',[UserController::class,'createRolesAPI']);
Route::get('departement',[UserController::class,'createDepartementsAPI']);
Route::post('adduser',[UserController::class,'storeUsresAPI']);
Route::post('inscriptionclient',[UserController::class,'storeClientAPI']);
Route::put('user/{id}',[UserController::class,'updateUser']);
Route::delete('deleteuser/{id}',[UserController::class,'destroyUsersAPI']);

/**Stocks**/
Route::get('stock',[StockController::class,'indexAPI']);
Route::get('fournisseur',[StockController::class,'createFournisseursAPI']);
Route::post('addstock',[StockController::class,'storeStocksAPI']);
Route::delete('deletestock/{id}',[StockController::class,'destroyStockAP']);
Route::get('searchstocks/{nom}',[StockController::class,'search']);
Route::put('stocks/{id}',[StockController::class,'updateStockAPI']);
Route::put('image/{id}',[StockController::class,'image']);
Route::get('stock/{id}',[StockController::class,'show']);

/**Archives**/
Route::get('archive',[ArchiveController::class,'indexAPI']);
Route::post('addarchive',[ArchiveController::class,'storearchivesAPI']);
Route::get('countFichier',[ArchiveController::class,'countFichier']);
Route::get('searcharchive/{description}',[ArchiveController::class,'search']);
Route::delete('deletearchive/{id}',[ArchiveController::class,'destroyArchiveAPI']);

/**Fournisseurs**/
Route::get('fournisseur',[FournisseurController::class,'indexAPI']);
Route::delete('deletefournisseur/{id}',[FournisseurController::class,'destroyFourAPI']);
Route::get('searchfourn/{nom}',[FournisseurController::class,'search']);
Route::post('addfournisseurs',[FournisseurController::class,'storefournisseursAPI']);

/**Commandes**/
Route::get('countCommande',[CommandeController::class,'countCommandeConfirmer']);
Route::get('facturecommande/{id}',[CommandeController::class,'showadminfactAPI']);
Route::get('commandee',[CommandeController::class,'indexAPII']);
Route::post('addcommande',[CommandeController::class,'storeAPI']);
Route::patch('commandesss/{id}',[CommandeController::class,'confirmerAPI']);
Route::patch('refusercommande/{id}',[CommandeController::class,'refuserAPI']);
/**reclamation**/
Route::get('reclamation',[ReclamationController::class,'indexAPI']);
Route::post('reclamation',[ReclamationController::class,'storeAPI']);
Route::patch('confirmerreclamation/{id}',[ReclamationController::class,'confirmerreclamationAPI']);
Route::patch('refuserreclamation/{id}',[ReclamationController::class,'refuserreclamationAPI']);
Route::delete('deletereclamation/{id}',[ReclamationController::class,'destroyAPI']);
/*******Clients*************Clients*********************Clients****************Clients***************/
/**Commandes**/
Route::get('commande',[CommandeController::class,'indexAPI']);

