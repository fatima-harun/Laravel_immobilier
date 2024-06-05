Bonjour {{session('personnel')->prenom}} <br> <br>
<a href="/deconnexion"><button>Deconnexion</button></a>
@if (session('status'))
    <div class="alert alert-success">
        <a href="/deconnexion">{{session('status')}}</a>
    </div>
 @endif

 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Espace personnel</title>
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
<h2>A propos</h2>
<div class="a_propos">
    <div>
        <p>À Listingplace, nous comprenons qu'acheter, vendre ou 
            investir dans l'immobilier peut être une tâche intimidante.
             C'est pourquoi nous nous engageons à fournir à nos clients des 
             conseils et un soutien personnalisés et spécialisés tout au long du 
             processus.Avec une équipe d'agents expérimentés et compétents, nous
              avons une compréhension approfondie du marché immobilier local et 
              pouvons vous aider à naviguer dans ses complexités avec facilité. 
              Que vous soyez un primo-accédant à la propriété, un investisseur
               chevronné ou à la recherche de votre propriété commerciale de rêve,
                nous sommes là pour vous aider à atteindre vos objectifs immobiliers.</p>
    </div>
    <div>
  <img src="{{ asset('https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}" alt="" style="width:400px;">
</div>
</div>
<h2>Découvrez nos biens</h2>
<div>
<!-- affichage des biens sous forme de carte  -->
</div>
<footer>
        <div><a class="navbar-brand" href="#"><img src="{{asset('images\Listingplace-removebg-preview.png')}}" alt="logo de l'entreprise" ></a></div>
        <div>
            <h3>Contact</h3>
            <p>Numéro de téléphone</p>
            <p>Numéro de téléphone</p>
        </div>
        <div>
            <h3>Newsletter</h3>
            <input type="text" placeholder="Votre email">
        </div>
</footer>
</body>
</html>