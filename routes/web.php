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
| Ici, vous pouvez enregistrer les routes web pour votre application. Ces
| routes sont chargées par le RouteServiceProvider et toutes seront
| assignées au groupe de middleware "web". Créez quelque chose de génial !
|
*/

// Route pour afficher la page d'accueil
Route::get('/', function () {
    return view('accueil');
});

// Routes pour la gestion des biens
Route::get("biens/index", [BienController::class, 'listeBien']); // Afficher la liste des biens dans la page nos biens
Route::get("/", [BienController::class, 'accueil']); // Afficher la liste des biens dans la page d'accueil
Route::get("/detailsBien/{id}", [BienController::class, 'detailsBien']); // Afficher les détails d'un bien

// Routes pour la gestion des commentaires
Route::get('/index', [CommentaireController::class, 'affichercommentaire']); // Afficher les commentaires d'un bien
Route::post('/sauvegarde/{bien_id}', [CommentaireController::class, 'sauvegardecommentaire']); // Sauvegarder un nouveau commentaire
Route::get('/recuperer/{id}', [CommentaireController::class, 'recuperercommentaire']); // Récupérer un commentaire pour modification
Route::patch('/modifier/{id}', [CommentaireController::class, 'modifiercommentaire']); // Modifier un commentaire
Route::get('/supprimer/{id}', [CommentaireController::class, 'supprimercommentaire']); // Supprimer un commentaire

// Routes pour l'authentification et l'inscription
Route::get('/inscription', [RegisterController::class, 'ajoutPersonnel']); // Afficher le formulaire d'inscription
Route::post('/sauvegardePersonnel', [RegisterController::class, 'sauvegardePersonnel']); // Sauvegarder un nouveau personnel
Route::get('/connexion', [RegisterController::class, 'connexion'])->name('connexion'); // Afficher le formulaire de connexion
Route::post('/traitementConnexion', [RegisterController::class, 'traitementConnexion']); // Traiter la connexion
Route::get('/espacePersonnel', function() {return view('personnels.espacePersonnel');})->middleware('checksession'); // Afficher l'espace personnel (protégé par middleware)
Route::get('/deconnexion', [RegisterController::class, 'deconnexion']); // Déconnecter l'utilisateur

// Groupe de routes protégé par le middleware 'checksession'
Route::middleware('checksession')->group(function () {
    // Routes pour la gestion des catégories
    Route::get('/categories/index', [CategorieController::class, 'listeCategorie']); // Afficher la liste des catégories
    Route::post('/sauvegardeCategorie', [CategorieController::class, 'sauvegardeCategorie']); // Sauvegarder une nouvelle catégorie
    Route::get("/modifierCategorie/{id}", [CategorieController::class, 'modifierCategorie']); // Afficher le formulaire de modification de catégorie
    Route::post('/sauvegardeMoficationCategorie', [CategorieController::class, 'sauvegardeMoficationCategorie']); // Sauvegarder les modifications d'une catégorie
    Route::get("/supprimerCategorie/{id}", [CategorieController::class, 'supprimerCategorie']); // Supprimer une catégorie

    // Routes pour la gestion des biens (protégé par middleware)
    Route::get("/ajoutBien", [BienController::class, 'ajoutBien']); // Afficher le formulaire d'ajout de bien
    Route::post('/sauvegardeBien', [BienController::class, 'sauvegardeBien']); // Sauvegarder un nouveau bien
    Route::get('/supprimerBien/{bien}', [BienController::class, 'supprimerBien']); // Supprimer un bien
    Route::get('/modifierBien/{bien}', [BienController::class, 'modifierBien']); // Afficher le formulaire de modification de bien
    Route::post('/sauvegardeMofication', [BienController::class, 'sauvegardeMofication']); // Sauvegarder les modifications d'un bien

    // Route pour afficher la liste des biens dans l'espace personnel
    Route::get("/espacePersonnel", [RegisterController::class, 'listeBien']);
});
