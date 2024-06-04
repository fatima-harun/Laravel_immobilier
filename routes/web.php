<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\RegisterController;


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


Route::get('/', function () {
    return view('welcome');
});
Route::get("biens/index" ,[BienController::class, 'listeBien']);
Route::get("/ajoutBien", [BienController::class, 'ajoutBien']);
Route::post('/sauvegardeBien',[BienController::class, 'sauvegardeBien']);
Route::get('/suprimmerBien/{bien}', [BienController::class, 'suprimmerBien']);
Route::get('/modifierBien/{bien}', [BienController::class, 'modifierBien']);
Route::post('/sauvegardeMofication', [BienController::class, 'sauvegardeMofication']);
Route::get("/detailsBien/{id}", [BienController::class, 'detailsBien']);


Route::get('/index',[CommentaireController::class,'affichercommentaire']);
Route::get('/formulaire',[CommentaireController::class,'ajoutcommentaire']);
Route::post('/sauvegarde',[CommentaireController::class,'sauvegardecommentaire']);
Route::get('/recuperer/{id}',[CommentaireController::class,'recuperercommentaire']);
Route::patch('/modifier',[CommentaireController::class,'modifiercommentaire']);
Route::get('/supprimer/{id}',[CommentaireController::class,'supprimercommentaire']);

