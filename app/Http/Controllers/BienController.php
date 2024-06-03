<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;

class BienController extends Controller
{
    public function listeBien()
    {
        $biens = Bien::all();
        return view('/biens/index',compact('biens'));
    }
    public function ajoutBien()
    {
        return view('/biens/ajoutBien');
    }
    public function sauvegardeBien(Request $request)
    {
        Bien::create($request->all());
        return redirect("/biens/index");
    }
    public function modifierBien($id)
    {
        $bien = Bien::find($id);
        return view('/biens/modificationBien', compact('bien'));
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

    public function suprimmerBien($id)
    {
        $bien = Bien::find($id);
        $bien->delete();  
        return back();
    }
}
