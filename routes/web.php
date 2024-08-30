<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::resource('/Produit', ProduitController::class);
Route::get('/Shop',[ProduitController::class,'AfficherProduit'] )->name('Produits');
Route::get('/AboutUs',[ProduitController::class,'AboutUs'] )->name('AboutUs');
Route::get('/DetailProduits/{id}',[ProduitController::class,'DetailProduits'] )->name('DetailProduits');
Route::get('/Contact',[ProduitController::class,'AffichageContact'] )->name('Contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
//Route For Panier Autorise Authentifier  
  Route::get('/Panier',[PanierController::class,'index'] )->name('Panier');
  Route::get('/AjoutePanierAuCommande',[PanierController::class,'AjoutePanierAuCommande'] )->name('AjoutePanierAuCommande');

  Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');
  Route::get('/AjouteProduitPannier/{id}', [PanierController::class,'AjouteProduitAuPannier'])->name('AjouteProduiAuPanier');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::get('/Dashboard',[AdminController::class,'index'] )->name('DashboardAdmin')->middleware('admin');
  Route::get('/DeleteProduitAuPanier/{id}',[PanierController::class,'DeleteProduitAuPanier'] )->name('DeleteProduitAuPanier');
  Route::get('/AfficherUtilisateurs',[AdminController::class,'AfficherUtilisateurs'] )->name('AfficherUtilisateurs');
  Route::get('/AjouteProduit',[AdminController::class,'AjouteProduit'] )->name('AjouteProduit');
  Route::post('/StoreProduit',[AdminController::class,'StoreProduit'] )->name('StoreProduit');

});

require __DIR__.'/auth.php';
