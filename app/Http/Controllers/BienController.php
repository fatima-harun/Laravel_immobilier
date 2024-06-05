<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Categorie;
use App\Models\Personnel;

class BienController extends Controller
{
    public function listeBien()
    {
        $biens = Bien::with('categorie')->get();
        return view('biens.index', compact('biens'));
    }
    public function ajoutBien()
    {
        $categories = Categorie::all();
        $personnel = Personnel::all(); // Supposons que vous avez un modèle Personnel pour le personnel
        return view('biens.ajoutBien', compact('categories', 'personnel'));
    }
    public function sauvegardeBien(Request $request)
    {
        $request->validate([
            'personnel_id' => 'required|exists:personnels,id',
            'categorie_id' => 'required|exists:categories,id',
            'nom' => 'required',
            'image' => 'required|url',
            'description' => 'required',
            'adresse' => 'required',
            'statut' => 'required|in:0,1',
        ],
        [
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
        Bien::create($request->all());
        return redirect("/biens/index");
    }
    public function modifierBien($id)
    {
        $bien = Bien::find($id);
        $categories = Categorie::all();
        $personnel = Personnel::all();
        return view('biens.modificationBien', compact('bien', 'categories','personnel'));
    }
    public function sauvegardeMofication(Request $request)
    {
        $request->validate([
            'personnel_id' => 'required|exists:personnels,id',
            'categorie_id' => 'required|exists:categories,id',
            'nom' => 'required',
            'image' => 'required|url',
            'description' => 'required',
            'adresse' => 'required',
            'statut' => 'required|in:0,1',
        ],
        [
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
        $bien = Bien::find($request->id);
        $bien->update($request->all());
        return redirect("/biens/index");
    }

    public function detailsBien($id)
    {
        $bien = Bien::find($id);
        return view('/biens/details' , compact('bien'));
    }

    public function supprimerBien($id)

    {
        $bien = Bien::find($id);
        $bien->delete();  
        return back();
    }
}
