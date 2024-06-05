<!DOCTYPE html>
<html>
<head>
    <title>Détails du Bien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    body{
        font-family: Roboto;
    }
    .imgage{
    width: 80%;
    height: auto; 
   
}

.details{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.imgage{
    float: left;
}
.infos{
    float: right;
}
h2{
    font-size: 30px;
    color:#43413d;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
}
span{
    font-size: 20px;
    color:#43413d;
    font-weight: 700;
}
p{
    font-size: 18px;
}
.gallery {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
    }
    .gallery-item {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 8px;
    }
    
    .image-title {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    .gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 24px;
        opacity: 0;
        transition: opacity 0.3s, transform 0.3s;
        transform: translateY(100%);
    }
    .gallery-item:hover .overlay {
        opacity: 1;
        transform: translateY(0);
    }
    .form-control{
        padding: 30px;
        border-radius: 8px;
    }
    .commentaire,hr{
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
    .commentaire{
        margin-bottom: 50px;
    }

</style>
<body>
    <div class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
        <h1 class="mb-4" style="text-align: center">Détails {{ $bien->nom }}</h1>
        <div class="details">
           <div class="image">
            <img src="{{ $bien->image }}" alt="{{ $bien->nom }}" style="width: 800px; border-radius: 8px;">
           </div>
            <div class="infos">
                <h2 >{{ $bien->nom }}</h2>
                <p ><span>Catégorie: </span>{{ $bien->categorie->nom }}</p>
                <p><span> Adresse: </span>{{ $bien->adresse }}</p>
                <p><span> Statut: </span>{{ $bien->statut ? 'Occupé' : 'Libre' }}</p>
                <p><span> Date: </span> {{ $bien->created_at }}</p>
            </div>
        </div>
        
        <div class="gallery mt-4">
            <div class="gallery-item">
                <div class="image-title">Cuisine</div>
                <img src="https://img.freepik.com/photos-premium/cuisine-contemporaine-armoires-blanches-brillantes-touche-couleur-backsplash-mosaique_148840-65616.jpg?w=740" alt="Cuisine">
                <div class="overlay">
                    <i class="fas fa-utensils"></i> <span style="color: white">1</span>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-title">Chambres</div>
                <img src="https://img.freepik.com/photos-premium/illustration-interieur-chambre_252025-36952.jpg?w=900" alt="chambre parents">
                <div class="overlay">
                    <i class="fas fa-bed"></i> <span style="color: white">3</span>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-title">Chambres Enfants</div>
                <img src="https://img.freepik.com/photos-gratuite/amenagement-chambres-petites-juveniles_23-2151113791.jpg?t=st=1717507197~exp=1717510797~hmac=32369d3ca75cab0270c12b53cf50c2f5a41f0256dc4d72a8d55d1de2e28a77af&w=740" alt="chambre enfant">
                <div class="overlay">
                    <i class="fas fa-bed"></i> <span style="color: white">3</span>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-title">Salle de bain</div>
                <img src="https://img.freepik.com/photos-gratuite/petite-salle-bain-decoree-dans-style-moderne_23-2150836639.jpg?t=st=1717507382~exp=1717510982~hmac=252ae83e3096911e0aeae2ffb927d80ff41ac4e26212787554c3867c564dc968&w=740" alt="salle de bain">
                <div class="overlay">
                    <i class="fas fa-bath"></i> <span style="color: white">6</span>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-title">Salon</div>
                <img src="https://img.freepik.com/photos-premium/illustration-interieur-du-salon_252025-93865.jpg?w=900" alt="Salon">
                <div class="overlay">
                    <i class="fas fa-couch"> </i> <span style="color: white">2</span>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-title">Jardin</div>
                <img src="https://img.freepik.com/photos-premium/table-chaise-patio-exterieur-vide-coussins_1339-102672.jpg?w=740" alt="jardin">
                <div class="overlay">
                    <i class="fas fa-tree"> </i> <span style="color: white">1</span>
                </div>
            </div>
        </div>
        <div class="description" style="margin-bottom: 30px; width:80%; margin-left: auto; margin-right: auto; text-align:justify;">
            <h2>Description </h2>
            <p>{{ $bien->description }}</p>
        </div>
        
        <hr>
        <div class="commentaire">
            @php
            $nbrCommentaire = $bien->commentaires()->count();
            @endphp

            <h3 class="side-title"><i class="fas fa-comments"> </i> Commentaires ({{ $nbrCommentaire }})</h3>
            @if ($bien->commentaires->isEmpty())
            <p>Pas de commentaire pour le moment.</p>
            @else
            @foreach ($bien->commentaires as $commentaire)
                <div class="auteur-card mt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-3 col-6">
                            <div>
                                <img src="https://img.freepik.com/vecteurs-libre/jolie-maison_23-2147503036.jpg?t=st=1717525961~exp=1717529561~hmac=cec61993ae07e9c4522084e5d3c71543837e80ef5ec475b38651edde56a15581&w=740"
                                    alt="auteur" class="rounded-circle img-fluid" >
                            </div>
                        </div>
                        <div class="col-sm-9 mt-sm-0 mt-3">
                            <h3 class="mb-3 title">{{ $commentaire->auteur }}</h3>
                            <ul class="author-icons mt-4">
                            </ul>
                            <p>{{ $commentaire->contenu }}</p>
                            <div class="action" style="display: flex; align-items:center; justify-content:end; float: left; margin-top:10px">
                                <a href="/recuperer/{{ $commentaire->id }}"class="btn btn-info" style="margin-right:10px; "><i class="fas fa-edit"></i> </a>
                                <a href="/supprimer/{{ $commentaire->id }}" class="btn btn-danger" style="margin-left: 10px;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- {{ $bien->commentaires->links() }} --}}
        @endif
        <h4 class="side-title mb-2">Laisser un commentaire</h4>
        <form action="/sauvegarde/{{ $bien->id }}" method="POST">
            @csrf
            <div class="input-grids row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" name="auteur" class="form-control" placeholder="Votre nom*" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contenu" class="form-control" placeholder="Votre commentaire*" required></textarea>
                    </div>
                </div>
            </div>
            <div class="submit ">
                <button class="btn " style="background: #0e2442; color:white; width:50%">Poster un commentaire</button>
            </div>
            
        </form>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
