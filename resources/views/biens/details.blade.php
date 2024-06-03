<!DOCTYPE html>
<html>
<head>
    <title>Détails du Bien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="/biens/index" class="btn btn-secondary">Retour</a>
        <h1 class="mb-4">Détails du Bien</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $bien->nom }}</h5>
                <p class="card-text">Image: <img src="{{ $bien->image }}" alt="{{ $bien->nom }}" class="img-fluid" style="max-width: 100px;"></p>
                <p class="card-text">Catégorie: {{ $bien->categorie->nom }}</p>
                <p class="card-text">Description: {{ $bien->description }}</p>
                <p class="card-text">Adresse: {{ $bien->adresse }}</p>
                <p class="card-text">Statut: {{ $bien->statut ? 'Occupé' : 'Libre' }}</p>
                <p class="card-text">Date d'ajout: {{ $bien->created_at }}</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
