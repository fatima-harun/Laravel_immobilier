<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Biens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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
</head>
<body>
<header class="custom-header-bg">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/Listingplace-removebg-preview.png') }}" alt="logo de l'entreprise"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Accueil</a>
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
            
        </div>

    </nav>
</header>

<div class="grand_titre">
    <h1>Découvrez nos biens</h1>
</div>
<div class="container mt-3">
    <div class="row justify-content-around">
        @foreach ($biens as $bien)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card" >
                    <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->nom }}" style="height: 300px">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">{{ $bien->nom }}</h5>
                        <p class="card-text">{{ Str::limit($bien->description, 100) }}</p>
                        <div class="detail">
                            <p>{{ $bien->adresse }}</p>
                            <p>{{ $bien->statut ? 'Occupé' : 'Libre' }}</p>
                        </div>
                        

                        <div class="d-flex justify-content-between">
                            <a href="/detailsBien/{{ $bien->id }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>
