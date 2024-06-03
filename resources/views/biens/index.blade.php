<!DOCTYPE html>
<html>
<head>
    <title>Liste des Biens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="/ajoutBien"> <button>Ajouter un bien</button></a>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
