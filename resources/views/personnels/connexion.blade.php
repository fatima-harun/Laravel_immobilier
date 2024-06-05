<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    body {
        font-family: Roboto;
        background: url('{{ asset('images/pexels-photo-7061662.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        height: 100vh;
        position: relative;
    }

    .color-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    h1 {
        text-align: center;
        color: white;
        margin-top: 20px;
    }

    form {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .form-control {
        padding: 22px;
        border-radius: 8px;
    }

    .btn {
        height: 50px;
        font-size: 30px;
        background: #0e2442;
        color: white;
        border-radius: 8px;
        text-align: center;
    }

    .btn:hover {
        background: white;
        color: #0e2442;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
</style>

<body>
    <div class="color-overlay">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <div class="container">
                        <h1 class="text-center">CONNEXION</h1>
                        <form action="/traitementConnexion" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Entrez votre email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('required')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe"
                                        placeholder="Entrez votre mot de passe" >
                                </div>
                                @error('mot_de_passe')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block ">SE CONNECTER</button>
                            <div style="font-weight: bold">
                                <p style="float: left; color:white;">Pas encore de compte?</p>
                                <a href="/inscription" style="float: right; color:white;"> S'inscrire</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
