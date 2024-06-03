<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Categorie;

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
        return view('biens.ajoutBien', compact('categories'));
    }
    public function sauvegardeBien(Request $request)
    {
        Bien::create($request->all());
        return redirect("/biens/index");
    }
    public function modifierBien($id)
    {
        $bien = Bien::find($id);
        $categories = Categorie::all();
        return view('biens.modificationBien', compact('bien', 'categories'));
    }
    public function sauvegardeMofication(Request $request)
    {
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
