<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Acceuil</title>
</head>
<style>
    
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

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
        <p class="carousel-caption-text text-left">Studio moderne et fonctionnel</p>
      </div>
      <img src="{{ asset('https://images.unsplash.com/photo-1628592102751-ba83b0314276?q=80&w=1997&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
        <p class="carousel-caption-text text-left">Propriété spacieuse avec vue imprenable</p>
      </div>
      <img src="{{ asset('https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
        <p class="carousel-caption-text text-left">Appartement familial dans un quartier calme</p>
      </div>
      <img src="{{ asset('https://images.pexels.com/photos/5785100/pexels-photo-5785100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
<h2>Qui sommes-nous</h2>

<div class="a_propos">
   <div class="box">
      <img src="{{ asset('https://cdn.pixabay.com/photo/2013/11/05/19/12/buildings-205986_640.jpg') }}" alt="" style="width:200px;">
     <h4>Notre Vision</h4>
     <p> Nous nous engageons à transformer vos rêves  
        immobiliers en réalité en vous accompagnant à chaque étape de votre projet, que ce soit pour l'achat,   
        la vente ou la gestion de biens immobiliers.</p>
   </div>

   <div class="box">
      <img src="{{ asset('https://images.pexels.com/photos/1367272/pexels-photo-1367272.jpeg?auto=compress&cs=tinysrgb&w=600') }}" alt="" style="width:200px;">
     <h4>Notre expertise</h4>
     <p>Nous croyons en l'importance de la collaboration et de la diversité des compétences 
      pour fournir des solutions  adaptées à vos besoins. Chaque membre de notre 
      équipe partage la meme passion.</p>
   </div>

   <div class="box">
      <img src="{{ asset('https://images.pexels.com/photos/5673488/pexels-photo-5673488.jpeg?auto=compress&cs=tinysrgb&w=600') }}" alt="" style="width:200px;">
     <h4>Notre engagement</h4>
     <p>Nous nous engageons à offrir un service transparent, honnête et respectueux. 
      Notre priorité est de créer une relation de confiance avec nos clients en leur
       fournissant des informations claires et précises.</p>
   </div>
</div>

<h2>Nos partenaires</h2>
<div class="partenaire">
  <div><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRha5SLf9nhXln6EhFB11bEtrcNQkwTYgEf9Q&s') }}" alt=""></div>
  <div><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRha5SLf9nhXln6EhFB11bEtrcNQkwTYgEf9Q&s') }}" alt=""></div>
  <div><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRha5SLf9nhXln6EhFB11bEtrcNQkwTYgEf9Q&s') }}" alt=""></div>
  <div><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRha5SLf9nhXln6EhFB11bEtrcNQkwTYgEf9Q&s') }}" alt=""></div>
  <div><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRha5SLf9nhXln6EhFB11bEtrcNQkwTYgEf9Q&s') }}" alt=""></div>
</div>

<footer>
        <div><a class="navbar-brand" href="#"><img src="{{asset('images\Listingplace-removebg-preview.png')}}" alt="logo de l'entreprise" ></a></div>
        <div>
        <small>&copy; 2024 Simplon. Tous droits réservés.</small>
        </div>
</footer>
</body>
</html>