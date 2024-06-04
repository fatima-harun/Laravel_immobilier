<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
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
