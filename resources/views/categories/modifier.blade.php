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
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/sauvegardeMoficationCategorie" method="POST">
                @csrf
                <input type="text" name="id" style="display: none" value="{{$categorie->id}}" >
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="{{$categorie->nom}}">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter une Catégorie</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>
