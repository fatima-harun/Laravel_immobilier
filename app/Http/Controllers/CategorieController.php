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
}
