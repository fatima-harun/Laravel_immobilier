<?php

use App\Http\Controllers\BienController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get("biens/index" ,[BienController::class, 'listeBien']);
Route::get("/ajoutBien", [BienController::class, 'ajoutBien']);
Route::post('/sauvegarde',[BienController::class, 'sauvegardeBien']);
Route::get('/suprimmerBien/{bien}', [BienController::class, 'suprimmerBien']);
Route::get('/modifierBien/{bien}', [BienController::class, 'modifierBien']);
Route::post('/sauvegardeMofication', [BienController::class, 'sauvegardeMofication']);
Route::get("/detailsBien/{id}", [BienController::class, 'detailsBien']);

