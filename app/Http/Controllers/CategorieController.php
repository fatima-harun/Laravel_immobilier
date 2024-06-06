<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Méthode pour afficher la liste de toutes les catégories
    public function listeCategorie()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        
        // Retourner la vue 'categories/index' avec les catégories
        return view('/categories/index', compact('categories'));
    }

    // Méthode pour sauvegarder une nouvelle catégorie
    public function sauvegardeCategorie(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|max:50',
        ], [
            'nom.required' => 'Le champ nom est requis.',
            'nom.max' => 'Le champ nom ne peut pas dépasser 50 caractères.',
        ]);
        
        // Créer une nouvelle catégorie avec les données validées
        Categorie::create($request->all());
        
        // Rediriger vers la page précédente
        return back();
    }

    // Méthode pour afficher le formulaire de modification d'une catégorie
    public function modifierCategorie($id)
    {
        // Récupérer la catégorie par son identifiant
        $categorie = Categorie::find($id);
        
        // Retourner la vue 'categories/modifier' avec la catégorie
        return view('/categories/modifier', compact('categorie'));
    }

    // Méthode pour sauvegarder les modifications d'une catégorie
    public function sauvegardeMoficationCategorie(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|max:50',
        ], [
            'nom.required' => 'Le champ nom est requis.',
            'nom.max' => 'Le champ nom ne peut pas dépasser 50 caractères.',
        ]);
        
        // Récupérer la catégorie par son identifiant
        $categorie = Categorie::find($request->id);
        
        // Mettre à jour la catégorie avec les données de la requête
        $categorie->update($request->all());
        
        // Rediriger vers la liste des catégories
        return redirect("/categories/index");
    }

    // Méthode pour supprimer une catégorie
    public function supprimerCategorie($id)
    {
        // Récupérer la catégorie par son identifiant
        $categorie = Categorie::find($id);
        
        // Supprimer la catégorie
        $categorie->delete();
        
        // Rediriger vers la page précédente
        return back();
    }
}
