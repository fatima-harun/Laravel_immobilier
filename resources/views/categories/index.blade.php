<!DOCTYPE html>
<html>

<head>
    <title>Catégories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Ajouter une nouvelle Catégorie</h2>

                <form action="/sauvegardeCategorie" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom"
                            placeholder="Entrer le nom de la catégorie">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter une Catégorie</button>
                </form>

                <hr>

                <h2>Listes des Catégories</h2>
                @if ($categories->isEmpty())
                    <p>pas de Catégories disponibles.</p>
                @else
                    <ul class="list-group">
                        @foreach ($categories as $categorie)
                            <li class="list-group-item">{{ $categorie->nom }}</li>
                            <a href="/modifierCategorie/{{ $categorie->id }}"
                                class="btn btn-primary btn-sm">Modifier</a>
                            <a href="/supprimerCategorie/{{ $categorie->id }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')">Supprimer</a>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
