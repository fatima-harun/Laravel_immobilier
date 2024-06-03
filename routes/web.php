<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentaireController;

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

Route::get('/index',[CommentaireController::class,'affichercommentaire']);
Route::get('/formulaire',[CommentaireController::class,'ajoutcommentaire']);
Route::post('/sauvegarde',[CommentaireController::class,'sauvegardecommentaire']);