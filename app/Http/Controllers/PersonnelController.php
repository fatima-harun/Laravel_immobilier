<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelController extends Controller
{
    public function ajoutPersonnel()
    {
        return view('/personnels/inscription');
    }
    public function sauvegardePersonnel(Request $request)

    {
        Personnel::create($request->all());
        return back()->with('le personnel a été ajouté avec succès');
    }
}
