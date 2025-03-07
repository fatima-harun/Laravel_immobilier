
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace personnel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{asset('images/Listingplace-removebg-preview.png')}}" alt="Logo">
            <h2>Bonjour {{session('personnel')->prenom}} </h2>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/espacePersonnel">
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="white" d="M18 15h-2v2h2m0-6h-2v2h2m2 6h-8v-2h2v-2h-2v-2h2v-2h-2V9h8M10 7H8V5h2m0 6H8V9h2m0 6H8v-2h2m0 6H8v-2h2M6 7H4V5h2m0 6H4V9h2m0 6H4v-2h2m0 6H4v-2h2m6-10V3H2v18h20V7z"/></svg>
                            <span>Biens</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/ajoutBien">
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20"><path fill="white" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2zm-1 11a10 10 0 1 1 0-20a10 10 0 0 1 0 20m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16"/></svg>
                            <span>Ajouter</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/categories/index">
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="white" d="M6.5 11L12 2l5.5 9zm11 11q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 21.5v-8h8v8zM17.5 20q1.05 0 1.775-.725T20 17.5t-.725-1.775T17.5 15t-1.775.725T15 17.5t.725 1.775T17.5 20M5 19.5h4v-4H5zM10.05 9h3.9L12 5.85zm7.45 8.5"/></svg>
                            <span>Categories</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/deconnexion">
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="white" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/></svg>
                            <span>Deconnexion</span>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <a href="/deconnexion">{{session('status')}}</a>
                                </div>
                            @endif
                        </div>

                    </a>
                </li>
            </ul>
            
        </nav>
    </div>
    <div class="main-content">
        <div class="grand_titre">
            <h1 >Liste des biens</h1>
            </div>
            <div class="container mt-3">
                {{-- <div class="bouton"><a href="/ajoutBien" class="btn mb-3" style="background: #0e2442; color:white; font-size:20px; border-raduis:5px;">Ajouter un bien</a></div> --}}
                <div class="row justify-content-around">
                    @foreach ($biens as $bien)
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="card" >
                                <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->nom }}"style="height: 300px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bien->nom }}</h5>
                                    <p class="card-text">{{ Str::limit($bien->description, 100) }}</p>
                                    <div class="detail">
                                        <p>{{ $bien->adresse }}</p>
                                        <p>{{ $bien->statut ? 'Occupé' : 'Libre' }}</p>
                                    </div>
            
                                    <div class="d-flex justify-content-between">
                                        <a href="/detailsBien/{{ $bien->id }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                                        <a href="/modifierBien/{{ $bien->id }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> <!-- Utilisez la classe d'icône pour l'édition -->
                                        </a>
                                        <a href="/supprimerBien/{{ $bien->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                                            <i class="fas fa-trash-alt"></i> <!-- Utilisez la classe d'icône pour la suppression -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
    </div>
</body>
</html>


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Roboto;
}

.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #0e2442;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    padding-top: 20px;
}

.logo {
    text-align: center;
    padding: 10px 0;
}

.logo img {
    height: auto;
    width: 100px;
}

nav {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin-top: -70px;
}

nav ul li {
    padding: 10px 0;
    text-align: center;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-family: Open sans;
    font-size:19px;
    gap:50px;
}



.icon-text {
    display: flex;
    align-items: center;
    margin-left: 70px;
}

.icon-text svg {
    margin-right: 10px; /* Espace entre l'icône et le texte */
}


.main-content {
    margin-left: 250px; 
    padding: 20px;
    flex-grow: 1;
    background-color: #f4f4f4;
    height: 100vh;
    overflow: auto;
}

.main-content h1 {
    margin-bottom: 20px;
    margin: 30px;
    text-align: center;
    color: white;
    font-weight: bold;
}
.bouton{
    display: flex;
    justify-content: right;
}
        .grand_titre{
            color: white;
            text-align: center;
            background-image: linear-gradient(rgba(1, 1, 15, 0.322), rgba(6, 6, 44, 0.582)), url("{{ asset('images/back.png') }}");
            background-size: cover;
            background-position: center;
        }
        .grand_titre h1{
            padding-bottom: 150px;
            padding-top: 150px;
            font-family: lato;
        }
        .card {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            /* margin-bottom: 20px; */
            /* height: 100%; */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom:12px;
        }
        .card:hover {
            z-index: 10;
            transform: scale(1.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
       

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            max-height: 350px; /* Ajustez cette valeur pour réduire la hauteur */
            overflow: hidden;
            background-color:#0e2442;
            color:white
        }
        .card .detail {
            display: flex;
            justify-content: space-between;
        }
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
        :root {
            --police-titre: 'Lato';
            --police-paragraphe: 'Open sans';
        }
        .navbar-brand img {
            height: auto;
            width: 50px;
        }
        .navbar-nav {
            font-family: Open sans;
            font-size: 19px;
            gap: 50px;
        }
        .nav-link {
            color: white;
        }
        .authentification button {
            background-color: transparent;
            color: white;
            border-color: white;
            border-radius: 20px;
        }
        .custom-header-bg {
            background-color: #0e2442;
        }
    
</style>