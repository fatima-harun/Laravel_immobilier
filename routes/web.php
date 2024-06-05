<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentaireController;

use App\Http\Controllers\PersonnelController;
use App\Models\Categorie;



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
    return view('accueil');
});

//routes des biens
Route::get("biens/index" ,[BienController::class, 'listeBien']);
Route::get("/" ,[BienController::class, 'accueil']);
// Route::get("/ajoutBien", [BienController::class, 'ajoutBien']);
// Route::post('/sauvegardeBien',[BienController::class, 'sauvegardeBien']);
// Route::get('/supprimerBien/{bien}', [BienController::class, 'supprimerBien']);
// Route::get('/modifierBien/{bien}', [BienController::class, 'modifierBien']);
// Route::post('/sauvegardeMofication', [BienController::class, 'sauvegardeMofication']);
Route::get("/detailsBien/{id}", [BienController::class, 'detailsBien']);

//routes des commentaires
Route::get('/index',[CommentaireController::class,'affichercommentaire']);
Route::post('/sauvegarde/{bien_id}',[CommentaireController::class,'sauvegardecommentaire']);
Route::get('/recuperer/{id}',[CommentaireController::class,'recuperercommentaire']);
Route::patch('/modifier/{id}',[CommentaireController::class,'modifiercommentaire']);
Route::get('/supprimer/{id}',[CommentaireController::class,'supprimercommentaire']);

//routes des categories
// Route::get('/categories/index', [CategorieController::class, 'listeCategorie']);
// Route::post('/sauvegardeCategorie', [CategorieController::class, 'sauvegardeCategorie'] );
// Route::get("/modifierCategorie/{id}", [CategorieController::class, 'modifierCategorie']);
// Route::post('/sauvegardeMoficationCategorie', [CategorieController::class,'sauvegardeMoficationCategorie']);
// Route::get("/supprimerCategorie/{id}", [CategorieController::class, 'supprimerCategorie']);

//routes pour l'authentification et l'inscription
Route::get('/inscription', [RegisterController::class, 'ajoutPersonnel']);
Route::post('/sauvegardePersonnel', [RegisterController::class, 'sauvegardePersonnel']);
Route::get('/connexion', [RegisterController::class, 'connexion'])->name('connexion');
Route::post('/traitementConnexion', [RegisterController::class, 'traitementConnexion']);
Route::get('/espacePersonnel', function() {return view('personnels.espacePersonnel');})->middleware('checksession');
// Route::get("/espacePersonnel" ,[RegisterController::class, 'listeBien']);
Route:: get('/deconnexion',[RegisterController::class,'deconnexion']);

Route::middleware('checksession')->group(function ()  {
    Route::get('/categories/index', [CategorieController::class, 'listeCategorie']);
    Route::post('/sauvegardeCategorie', [CategorieController::class, 'sauvegardeCategorie']);
    Route::get("/modifierCategorie/{id}", [CategorieController::class, 'modifierCategorie']);
    Route::post('/sauvegardeMoficationCategorie', [CategorieController::class, 'sauvegardeMoficationCategorie']);
    Route::get("/supprimerCategorie/{id}", [CategorieController::class, 'supprimerCategorie']);
    Route::get("/ajoutBien", [BienController::class, 'ajoutBien']);
    Route::post('/sauvegardeBien', [BienController::class, 'sauvegardeBien']);
    Route::get('/supprimerBien/{bien}', [BienController::class, 'supprimerBien']);
    Route::get('/modifierBien/{bien}', [BienController::class, 'modifierBien']);
    Route::post('/sauvegardeMofication', [BienController::class, 'sauvegardeMofication']);
    Route::get("/espacePersonnel", [RegisterController::class, 'listeBien']);
});
