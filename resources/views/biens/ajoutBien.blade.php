<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Bien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/ajout.css') }}">
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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 " style="margin-top: 50px;">
            <img src="https://cdn.pixabay.com/photo/2023/01/14/14/16/staircase-7718335_1280.jpg" class="img-fluid" alt="Image" >
        </div>
        <div class="col-md-6">
            <h3 class="mb-4 text-center">Formulaire d'ajout d'un bien</h3>
            <form action="/sauvegardeBien" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" id="personnel_id" name="personnel_id">
                        <option value="" disabled selected>Choisir un personnel</option>
                        @foreach($personnel as $p)
                            <option value="{{ $p->id }}">{{ $p->nom }} {{ $p->prenom }}</option>
                        @endforeach
                    </select>
                    @error('personnel_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <select class="form-control" id="categorie_id" name="categorie_id">
                        <option value="" disabled selected>Choisir une catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du bien">
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="image" name="image" placeholder="URL de l'image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description du bien"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse du bien">
                    @error('adresse')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
                    @error('statut')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-custom">Ajouter</button>
            </form>
        </div>
    </div>
</div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
   
    </style>