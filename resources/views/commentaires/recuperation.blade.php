<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
    <!-- Inclure le CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un Commentaire</h1>
        <form action="/modifier/{{ $commentaire->id }}" method="POST">
            @method('PATCH')
            @csrf
            <input type="hidden" class="form-control" name="id"  value="{{ $commentaire->id }}">
            <div class="col-12">
                <div class="form-group">
                    <input type="text" name="auteur" class="form-control" value="{{ old('auteur', $commentaire->auteur) }}">
                    @error('auteur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="contenu" class="form-control">{{ old('contenu', $commentaire->contenu) }}</textarea>
                    @error('contenu')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="submit text-left">
                <button class="btn " style="background: black; color:white;">Modifier le commentaire</button>
            </div>
        </form>
        
        
    </div>
    <!-- Inclure le JS de Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
