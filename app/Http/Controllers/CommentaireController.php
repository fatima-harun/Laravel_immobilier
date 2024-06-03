<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function affichercommentaire(){
        $commentaires = Commentaire::All();
        return view('commentaires.index',compact('commentaires'));
    }

    public function ajoutcommentaire(){
        return view('commentaires.formulaire');
       ;
    }
    public function sauvegardecommentaire(Request $request){
        Commentaire::create($request->all());
        return redirect('/index');
       ;
    }
    public function recuperercommentaire($id){
        $commentaires = Commentaire::find($id);
         return view('commentaires.recuperation',compact('commentaires'));
    }

    public function modifiercommentaire(Request $request){
       $commentaire = Commentaire::find($request->id);
       $commentaire->update($request->all());
       return redirect('/index');
    }
    public function supprimercommentaire($id){
     $commentaire = Commentaire::find($id);
     $commentaire->delete();
     return back();
    }

}
