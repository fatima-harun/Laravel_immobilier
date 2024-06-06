<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Categorie;
use App\Models\Personnel;

class BienController extends Controller
{
     // Méthode pour afficher la liste de tous les biens
     public function listeBien()
     {
         // Récupérer tous les biens avec leurs catégories associées
         $biens = Bien::with('categorie')->get();
         
         // Retourner la vue 'biens.index' avec les biens
         return view('biens.index', compact('biens'));
     }

    // Méthode pour afficher l'accueil avec les trois premiers biens
    public function accueil()
    {
        // Récupérer les trois premiers biens avec leurs catégories associées
        $biens = Bien::with('categorie')->take(3)->get();
        
        // Retourner la vue 'accueil' avec les biens
        return view('accueil', compact('biens'));
    }
   // Méthode pour afficher le formulaire d'ajout d'un bien
    public function ajoutBien()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        
        // Récupérer les informations de l'utilisateur connecté depuis la session
        $personnel = session('personnel');
        
        // Retourner la vue 'biens.ajoutBien' avec les catégories et le personnel
        return view('biens.ajoutBien', compact('categories', 'personnel'));
    }

     // Méthode pour sauvegarder un nouveau bien
     public function sauvegardeBien(Request $request)
     {
         // Valider les données de la requête
         $request->validate([
             'personnel_id' => 'required|exists:personnels,id',
             'categorie_id' => 'required|exists:categories,id',
             'nom' => 'required',
             'image' => 'required|url',
             'description' => 'required',
             'adresse' => 'required',
             'statut' => 'required|in:0,1',
         ], [
             'personnel_id.required' => 'Veuillez choisir un personnel.',
             'personnel_id.exists' => 'Le personnel sélectionné n\'existe pas.',
             'categorie_id.required' => 'Veuillez choisir une catégorie.',
             'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
             'nom.required' => 'Veuillez entrer le nom du bien.',
             'image.required' => 'Veuillez entrer l\'URL de l\'image.',
             'image.url' => 'L\'URL de l\'image doit être une URL valide.',
             'description.required' => 'Veuillez entrer une description du bien.',
             'adresse.required' => 'Veuillez entrer l\'adresse du bien.',
             'statut.required' => 'Veuillez choisir le statut du bien.',
             'statut.in' => 'Le statut du bien doit être soit libre soit occupé.',
         ]);
         
         // Créer un nouveau bien avec les données validées
         Bien::create($request->all());
         
         // Rediriger vers l'espace personnel
         return redirect("/espacePersonnel");
     }
    // Méthode pour afficher le formulaire de modification d'un bien
    public function modifierBien($id)
    {
        // Récupérer le bien par son identifiant
        $bien = Bien::find($id);
        
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        
        // Récupérer les informations de l'utilisateur connecté depuis la session
        $personnel = session('personnel');
        
        // Retourner la vue 'biens.modificationBien' avec le bien, les catégories et le personnel
        return view('biens.modificationBien', compact('bien', 'categories', 'personnel'));
    }
    // Méthode pour sauvegarder les modifications d'un bien
    public function sauvegardeMofication(Request $request)
    {
        // Récupérer le bien par son identifiant
        $bien = Bien::find($request->id);
        
        // Mettre à jour le bien avec les données de la requête
        $bien->update($request->all());
        
        // Rediriger vers l'espace personnel
        return redirect("/espacePersonnel");
    }


    
    // Méthode pour afficher les détails d'un bien
    public function detailsBien($id)
    {
        // Récupérer le bien par son identifiant
        $bien = Bien::find($id);
        
        // Retourner la vue 'biens.details' avec le bien
        return view('/biens/details', compact('bien'));
    }

    // Méthode pour supprimer un bien
    public function supprimerBien($id)
    {
        // Récupérer le bien par son identifiant
        $bien = Bien::find($id);
        
        // Supprimer le bien
        $bien->delete();
        
        // Rediriger vers la page précédente
        return back();
    }
}
