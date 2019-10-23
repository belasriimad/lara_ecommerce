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
      <a class="navbar-brand" href="{{route('index')}}">Store.com</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('admin')}}">Accueil <span class="sr-only">(current)</span></a></li>
        <li><a href="{{url('/admin/products')}}">Produits</a></li>
        <li><a href="{{url('/admin/categories')}}">Categories</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="{{url('/admin/users')}}">Inscrits</a></li>
        <li><a href="{{route('user.logout')}}">Déconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>