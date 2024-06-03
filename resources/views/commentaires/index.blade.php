<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <!-- Inclure le CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="/formulaire">
        <button>Ajouter</button>
    </a>
    <div class="container mt-5">
        <h1 class="mb-4">Commentaires</h1>
        <div class="list-group">
            @foreach ($commentaires as $commentaire)
                <div class="list-group-item">
                    <p class="mb-1">{{ $commentaire->contenu }}</p>
                    <p class="mb-1">{{ $commentaire->created_at }}</p>
                    <a href="/recuperer/{{$commentaire->id}}">
                        <button>modifier</button>
                    </a>
                    <a href="/supprimer/{{$commentaire->id}}" onclick="return confirm('Voulez-vous vraiment supprimer le commentaire')">
                        <button>supprimer</button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Inclure le JS de Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
