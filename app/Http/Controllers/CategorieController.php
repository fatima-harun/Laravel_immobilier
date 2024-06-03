<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function listeCategorie()
    {
        $categories = Categorie::all();
        return view('/categories/index' , compact('categories'));
    }
    
    public function sauvegardeCategorie(Request $request)
    {
        Categorie::create($request->all());
        return back();
    }
    public function modifierCategorie($id)
    {
        $categorie = Categorie::find($id);
        return view('/categories/modifier', compact('categorie'));
    }
    public function sauvegardeMoficationCategorie(Request $request)
    {
        $categorie=Categorie::find($request->id);
        $categorie->update($request->all());
        return redirect("/categories/index");
    }
    public function supprimerCategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie ->delete();
        return back();

    }
}
