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

    {   // Extraire toutes les données du formulaire
        $data = $request->all();
    
        // Hasher le mot de passe avant de sauvegarder
        $data['mot_de_passe'] = bcrypt($request->input('mot_de_passe'));
    
        // Créer un nouvel enregistrement dans la base de données avec les données modifiées
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
    // Cette méthode de contrôleur traite la demande de connexion d'un utilisateur.
    public function traitementConnexion(Request $request)
    {
        // Récupération des données de la demande à partir du formulaire de connexion via l'objet $request.
        $personnel = Personnel::where('email', $request->input('email'))->first();

        // Vérifie si l'utilisateur est trouvé dans la base de données.
        if($personnel){
            // Vérification si le mot de passe fourni correspond au mot de passe haché stocké dans la base de données.
            if (Hash::check($request->input('mot_de_passe'), $personnel->mot_de_passe)) {
                // Si l'authentification est réussie, les données de l'utilisateur sont placées dans la session avec la clé personnel.
                $request->session()->put('personnel', $personnel);
                // L'utilisateur est redirigé vers une page, généralement la page d'accueil ou une page protégée réservée aux utilisateurs connectés.
                return redirect('/espacePersonnel');
            } else {
                // Si le mot de passe ne correspond pas, un message d'erreur est renvoyé et l'utilisateur est redirigé vers la page précédente.
                return back()->with('status', 'Identifiant ou mot de passe incorrect.');
            }
        } else {
            // Si l'email n'est pas trouvé dans la base de données, un message d'erreur est renvoyé et l'utilisateur est redirigé vers la page précédente.
            return back()->with('status', 'Désolé, vous n\'avez pas de compte avec cet email.');
        }
    }
    public function deconnexion(Request $request)
    {
        $request->session()->forget('personnel');
        return redirect('/connexion')->with('status', 'Vous venez de vous déconnecter.');
    }

}
