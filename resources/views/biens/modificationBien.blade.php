<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Bien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier un Bien</h1>
        <form action="/sauvegardeMofication" method="POST" >
            @csrf
            <input type="text" name="id" style="display: none;" value="{{ $bien->id }}">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $bien->nom }}">
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select class="form-control" id="categorie_id" name="categorie_id">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $bien->categorie_id == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $bien->image }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $bien->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $bien->adresse }}">
            </div>
            <div class="form-group">
                <label>Statut</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statut" id="libre" value="0" {{ $bien->statut == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="libre">Libre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="statut" id="occupe" value="1" {{ $bien->statut == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="occupe">Occupé</label>
                </div>
            </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
