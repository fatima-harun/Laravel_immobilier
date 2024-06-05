<!DOCTYPE html>
<html>
<head>
    <title>Liste des Biens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   
</head>
<style>
    .grand_titre{
        color:white;
        text-align:center;
        background-image: linear-gradient(rgba(1, 1, 15, 0.322), rgba(6, 6, 44, 0.582) ),url("{{ asset('images/back.png') }}");
        background-size: cover;
        background-position: center; 
    }
    .grand_titre h1{
        padding-bottom:150px;
        padding-top:150px;
        font-family:lato
    }
    .card{
        border-top-left-radius: 150px;
            border-top-right-radius: 155px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');

:root{
 --police-titre:'Lato';
 --police-paragraphe:'Open sans'
}

.navbar-brand img{
    height: auto;
    width: 50px;
}
.navbar-nav{
    font-family: Open sans;
    font-size:19px;
    gap:50px;
}
.nav-link{
    color:white
}
.authentification button {
    background-color:transparent;
    color: white;
    border-color: white;
    border-radius: 20px;
}
.custom-header-bg{
    background-color: #0e2442;
}
.detail{
    display:flex
}
</style>
<body>
<header class="custom-header-bg">

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid mx-4">
        <a class="navbar-brand" href="#"><img src="{{asset('images\Listingplace-removebg-preview.png')}}" alt="logo de l'entreprise" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos biens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="authentification ">
            <a href=""><button>Se connecter</button></a>
            <a href=""><button>S'inscrire</button></a>
        </div>
    </div>
</nav>

</header>
    <div class="grand_titre">
<h1 >Découvrez nos biens</h1>
</div>
<div class="container mt-5">
    <div class="row justify-content-around">
        @foreach ($biens as $bien)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bien->nom }}</h5>
                        <p class="card-text">{{ Str::limit($bien->description, 100) }}</p>
                        <div class='detail'>
                        <div><p>{{ $bien->adresse }}</p></div>
                        <div><p>{{ $bien->categorie->nom }}</p></div> 
                        </div>
                        <p>{{ $bien->statut ? 'Occupé' : 'Libre' }}</p>
                        <p>{{ $bien->created_at }}</p>
                        <a href="/detailsBien/{{ $bien->id }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="/modifierBien/{{ $bien->id }}" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="/supprimerBien/{{ $bien->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')">Supprimer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>


























<!-- 
    <div class="container mt-5">
        <a href="/ajoutBien"><button class="btn btn-success mb-4">Ajouter un bien</button></a>
        <h1 class="mb-4">Liste des Biens</h1>
        @if($biens->isEmpty())
            <div class="alert alert-info">Aucun bien disponible.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Adresse</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biens as $bien)
                        <tr>
                            <td>{{ $bien->nom }}</td>
                            <td><img src="{{ $bien->image }}" alt="{{ $bien->nom }}" class="img-fluid" style="max-width: 100px;"></td>
                            <td>{{ Str::limit($bien->description, 100) }}</td>
                            <td>{{ $bien->adresse }}</td>
                            <td>{{ $bien->statut ? 'Occupé' : 'Libre' }}</td>
                            <td>{{ $bien->categorie->nom }}</td>
                            <td>{{ $bien->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Voir</a>
                                <a href="#" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
