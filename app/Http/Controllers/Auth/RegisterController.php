<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Bien;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Méthode pour afficher le formulaire d'inscription
    public function ajoutPersonnel(Request $request)
    {
        // Vérifier si un personnel est déjà connecté
        if ($request->session()->get('personnel')) {
            // Rediriger vers l'espace personnel avec un message
            return redirect('/espacePersonnel')->with('status', 'Vous devez vous déconnecter avant de vous ré-inscrire.');
        }
        // Afficher le formulaire d'inscription
        return view('/personnels/inscription');
    }

    // Méthode pour sauvegarder un nouveau personnel
    public function sauvegardePersonnel(Request $request)
    {   
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:personnels,email',
            'mot_de_passe' => 'required|min:8',
            'telephone' => 'required|digits:9',
        ], [
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

        // Récupérer toutes les données de la requête
        $data = $request->all();
        // Hacher le mot de passe avant de le sauvegarder
        $data['mot_de_passe'] = bcrypt($request->input('mot_de_passe'));
        // Créer un nouveau personnel avec les données validées
        Personnel::create($data);
        // Rediriger vers la vue de connexion
        return view('personnels/connexion');
    }

    // Méthode pour afficher le formulaire de connexion
    public function connexion(Request $request)
    {
        // Vérifier si un personnel est déjà connecté
        if ($request->session()->get('personnel')) {
            // Rediriger vers l'espace personnel avec un message
            return redirect('/espacePersonnel')->with('status', 'Vous devez vous déconnecter avant de vous reconnecter.');
        }
        // Afficher le formulaire de connexion
        return view('personnels/connexion');
    }

    // Méthode pour traiter la connexion
    public function traitementConnexion(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ], [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
        ]);

        // Récupérer le personnel par son adresse email
        $personnel = Personnel::where('email', $request->input('email'))->first();
        if ($personnel) {
            // Vérifier si le mot de passe est correct
            if (Hash::check($request->input('mot_de_passe'), $personnel->mot_de_passe)) {
                // Mettre les informations du personnel dans la session
                $request->session()->put('personnel', $personnel);
                // Rediriger vers l'espace personnel
                return redirect('/espacePersonnel');
            } else {
                // Rediriger avec un message d'erreur pour mot de passe incorrect
                return back()->with('status', 'Mot de passe incorrect.');
            }
        } else {
            // Rediriger avec un message d'erreur pour email non trouvé
            return back()->with('status', 'Désolé, vous n\'avez pas de compte avec cet email.');
        }
    }

    // Méthode pour déconnecter le personnel
    public function deconnexion(Request $request)
    {
        // Supprimer les informations du personnel de la session
        $request->session()->forget('personnel');
        // Rediriger vers la page de connexion avec un message
        return redirect('/connexion')->with('status', 'Vous venez de vous déconnecter.');
    }

    // Méthode pour afficher la liste des biens dans l'espace personnel
    public function listeBien()
    {
        // Récupérer tous les biens avec leurs catégories associées
        $biens = Bien::with('categorie')->get();
        // Retourner la vue 'personnels/espacePersonnel' avec les biens
        return view('personnels/espacePersonnel', compact('biens'));
    }
}
