<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Bien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/ajout.css') }}">
</head>

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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="https://cdn.pixabay.com/photo/2023/01/14/14/16/staircase-7718335_1280.jpg" class="img-fluid" alt="Image">
        </div>
        <div class="col-md-6">
            <h3 class="mb-4 text-center">Formulaire d'ajout d'un bien</h3>
            <form action="/sauvegardeBien" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" id="personnel_id" name="personnel_id" required>
                        <option value="" disabled selected>Choisir un personnel</option>
                        @foreach($personnel as $p)
                            <option value="{{ $p->id }}">{{ $p->nom }} {{ $p->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <select class="form-control" id="categorie_id" name="categorie_id" required>
                        <option value="" disabled selected>Choisir une catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du bien" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="image" name="image" placeholder="URL de l'image" required>
                </div>
                
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description du bien" required></textarea>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse du bien" required>
                </div>
                
                <div class="form-group text-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="statut" id="libre" value="0" checked>
                        <label class="form-check-label" for="libre">Libre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="statut" id="occupe" value="1">
                        <label class="form-check-label" for="occupe">Occupé</label>
                    </div>
                </div>
                
                <button type="submit" class="btn-custom">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
