Bonjour {{session('personnel')->prenom}} <br> <br>
<a href="/deconnexion"><button>Deconnexion</button></a>
@if (session('status'))
    <div class="alert alert-success">
        <a href="/deconnexion">{{session('status')}}</a>
    </div>
 @endif