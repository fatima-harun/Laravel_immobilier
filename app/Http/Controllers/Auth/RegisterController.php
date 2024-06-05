<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function ajoutPersonnel(Request $request)
    {
        if ($request->session()->get('personnel')) {
            return redirect('/espacePersonnel')->with('status', 'Vous devez vous déconnecter avant de vous ré-inscrire.');
        }
        return view('/personnels/inscription');
    }



    public function sauvegardePersonnel(Request $request)

    {   
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:personnels,email',
            'mot_de_passe' => 'required|min:8',
            'telephone' => 'required|digits:9',
        ],
        [
            'nom.required' => 'Veuillez entrer votre nom.',
            'prenom.required' => 'Veuillez entrer votre prénom.',
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
            'mot_de_passe.min' => 'Votre mot de passe doit comporter au moins 8 caractères.',
            'telephone.required' => 'Veuillez entrer votre numéro de téléphone.',
            'telephone.digits' => 'Le numéro de téléphone doit comporter exactement 9 chiffres.',
        ]);
        
        $data = $request->all();
        $data['mot_de_passe'] = bcrypt($request->input('mot_de_passe'));
        Personnel::create($data);
        return view('personnels/connexion');
    }



    public function connexion(Request $request)
    {
        if ($request->session()->get('personnel')) {
            return redirect('/espacePersonnel')->with('status', 'Vous devez vous déconnecter avant de vous reconnecter.');
        }
        return view('personnels/connexion');
    }
    
    

    public function traitementConnexion(Request $request)
    {
        $request ->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ],
        [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
        ]);
        $personnel = Personnel::where('email', $request->input('email'))->first();
        if($personnel){
            if (Hash::check($request->input('mot_de_passe'), $personnel->mot_de_passe)) {
                $request->session()->put('personnel', $personnel);
                return redirect('/espacePersonnel');
            } else {
                return back()->with('status', ' mot de passe incorrect.');
            }
        } else {
            return back()->with('status', 'Désolé, vous n\'avez pas de compte avec cet email.');
        }
    }


    public function deconnexion(Request $request)
    {
        $request->session()->forget('personnel');
        return redirect('/connexion')->with('status', 'Vous venez de vous déconnecter.');
    }

}
