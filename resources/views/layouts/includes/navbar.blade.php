<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Store.com</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('index')}}">Accueil <span class="sr-only">(current)</span></a></li>
        <li><a href="{{route('product.index')}}">Produits</a></li>
        <li><a href="{{route('product.panier')}}">Panier {{Cart::count()}}</a></li>
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
        <li><a href="{{url('/admin')}}">Admin</a></li>
        @endif
        @endif
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(!Auth::check())
            <li><a href="{{route('user.create')}}">Inscription</a></li>
            <li><a href="{{route('user.login')}}">Connexion</a></li>
            @else
            <li><a href="{{route('user.logout')}}">Déconnexion</a></li>
            @endif
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" method="post" action="">
        <div class="form-group">
          <input type="text" class="form-control" name="user" placeholder="Recherche">
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}"/>
        <button type="submit" class="btn btn-default">Recherche</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>