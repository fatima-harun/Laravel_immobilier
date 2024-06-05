<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Bien;


class CommentaireController extends Controller
{
    public function affichercommentaire($id)
    {
        $bien = Bien::with('commentaires')->find($id);
        $commentaires = $bien->commentaires()->paginate(2);
       return view('biens.details', compact('bien', 'commentaires'));
    }
   
    public function sauvegardecommentaire(Request $request, $bien_id){
        $bien = Bien::find($bien_id);

        $request->validate([
            'auteur' => 'required|max:50',
            'contenu' => 'required',
        ], [
            'auteur.required' => 'Le champ auteur est requis.',
            'auteur.max' => 'Le champ auteur ne peut pas dépasser 50 caractères.',
            'contenu.required' => 'Le champ contenu est requis.',
        ]);
        Commentaire::create([
            'auteur' => $request->input('auteur'),
            'contenu' => $request->input('contenu'),
            'bien_id' => $bien_id, 
        ]);
    
        return back();
    }
    
    public function recuperercommentaire($id){
        $commentaire = Commentaire::find($id);
        return view('commentaires.recuperation',compact('commentaire'));
    }

    public function modifiercommentaire(Request $request){
       $commentaire = Commentaire::find($request->id);
       $commentaire->update($request->all());
       return redirect('detailsBien/' . $commentaire->bien_id);
    }

    public function supprimercommentaire($id){
     $commentaire = Commentaire::find($id);
     $commentaire->delete();
     return back();
    }

}
