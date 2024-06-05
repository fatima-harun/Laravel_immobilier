<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Acceuil</title>
</head>
<style>
    
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
        .card {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            /* margin-bottom: 20px; */
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
           
            overflow: hidden;
            background-color:#0e2442;
            color:white
        }
        .card .detail {
            display: flex;
            justify-content: space-between;
        }
        .btn-custom {
    border: none;
    width: 30%;
    height: 50px;
    font-size: 25px;
    background: #0e2442;
    color: white;
    border-radius: 8px;
    text-align: center;
    margin-top: 30px;
}

.btn-custom:hover {
    background: white;
    color: #0e2442;
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
                        <a class="nav-link " aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/biens/index">Nos biens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
</header>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier un Commentaire</h1>
        <form action="/modifier/{{ $commentaire->id }}" method="POST">
            @method('PATCH')
            @csrf
            <input type="hidden" class="form-control" name="id"  value="{{ $commentaire->id }}">
            <div class="col-12">
                <div class="form-group">
                    <input type="text" name="auteur" class="form-control" value="{{ old('auteur', $commentaire->auteur) }}">
                    @error('auteur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="contenu" class="form-control">{{ old('contenu', $commentaire->contenu) }}</textarea>
                    @error('contenu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="submit text-left">
                <button class="btn btn-custom " >Modifier le commentaire</button>
            </div>
        </form>
        
        
    </div>
    <!-- Inclure le JS de Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer style="display: flex; justify-content:space-between; align-items:center; margin-top:213px;">
    <div><a class="navbar-brand" href="#"><img src="{{asset('images\Listingplace-removebg-preview.png')}}" alt="logo de l'entreprise" ></a></div>
    <div>
    <small>&copy; 2024 Simplon. Tous droits réservés.</small>
    </div>
</footer>
</html>
