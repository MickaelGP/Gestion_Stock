<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\InventaireController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route get
Route::get('/',[InventaireController::class,'index']);
Route::get('/ajout-produits',[InventaireController::class,'create'])->name('inventaire.create');
Route::get('/recherche',[InventaireController::class,'search'])->name('inventaire.search');
Route::get('/modification-produits-{inventaire}',[InventaireController::class,'edit'])->name('inventaire.edit');
//Route::get('/liste-de-courses',[InventaireController::class,'liste'])->name('inventaire.liste');
//Route Post
Route::post('/ajout-produits',[InventaireController::class,'store'])->name('inventaire.store');
Route::post('/modification-produits-{id}',[InventaireController::class,'update'])->name('inventaire.update');
Route::post('/{id}',[InventaireController::class,'destroy'])->name('inventaire.destroy');
//Route Export
Route::get('/export-inventaire', [ExportController::class,'export'])->name('export.inventaire');





