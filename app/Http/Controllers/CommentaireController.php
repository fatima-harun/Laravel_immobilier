<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Bien;

class CommentaireController extends Controller
{
    // Méthode pour afficher les commentaires d'un bien
    public function affichercommentaire($id)
    {
        // Récupérer le bien par son identifiant avec ses commentaires
        $bien = Bien::with('commentaires')->find($id);
        
        // Paginer les commentaires, 2 par page
        $commentaires = $bien->commentaires()->paginate(2);
        
        // Retourner la vue 'biens.details' avec le bien et ses commentaires
        return view('biens.details', compact('bien', 'commentaires'));
    }

    // Méthode pour sauvegarder un nouveau commentaire
    public function sauvegardecommentaire(Request $request, $bien_id)
    {
        // Récupérer le bien par son identifiant
        $bien = Bien::find($bien_id);

        // Valider les données de la requête
        $request->validate([
            'auteur' => 'required|max:50',
            'contenu' => 'required',
        ], [
            'auteur.required' => 'Le champ auteur est requis.',
            'auteur.max' => 'Le champ auteur ne peut pas dépasser 50 caractères.',
            'contenu.required' => 'Le champ contenu est requis.',
        ]);
        
        // Créer un nouveau commentaire avec les données validées
        Commentaire::create([
            'auteur' => $request->input('auteur'),
            'contenu' => $request->input('contenu'),
            'bien_id' => $bien_id,
        ]);

        // Rediriger vers la page précédente
        return back();
    }

    // Méthode pour récupérer un commentaire spécifique pour modification
    public function recuperercommentaire($id)
    {
        // Récupérer le commentaire par son identifiant
        $commentaire = Commentaire::find($id);
        
        // Retourner la vue 'commentaires.recuperation' avec le commentaire
        return view('commentaires.recuperation', compact('commentaire'));
    }

    // Méthode pour modifier un commentaire
    public function modifiercommentaire(Request $request)
    {
        // Récupérer le commentaire par son identifiant
        $commentaire = Commentaire::find($request->id);
        
        // Mettre à jour le commentaire avec les données de la requête
        $commentaire->update($request->all());
        
        // Rediriger vers les détails du bien associé au commentaire
        return redirect('detailsBien/' . $commentaire->bien_id);
    }

    // Méthode pour supprimer un commentaire
    public function supprimercommentaire($id)
    {
        // Récupérer le commentaire par son identifiant
        $commentaire = Commentaire::find($id);
        
        // Supprimer le commentaire
        $commentaire->delete();
        
        // Rediriger vers la page précédente
        return back();
    }
}
