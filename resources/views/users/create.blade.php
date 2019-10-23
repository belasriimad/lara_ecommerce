@extends('layouts.includes.main-index')

@section('content')
       
<div class="row" style="margin-top:50px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Inscription</div>
             <form action="{{route('user.create')}}" method="post" class="" style="padding:10px">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                <label for="nom">Nom*</label>
                <input type="text" class="form-control" name="nom" placeholder="Votre Nom">
                @if($errors->has('nom'))
                    <span style="color:red">{{$errors->first('nom')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="prenom">Prénom*</label>
                <input type="text" class="form-control" name="prenom" placeholder="Votre Prénom">
                @if($errors->has('prenom'))
                    <span style="color:red">{{$errors->first('nom')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="ville">Ville*</label>
                <input type="text" class="form-control" name="ville" placeholder=Ville>
                @if($errors->has('ville'))
                    <span style="color:red">{{$errors->first('ville')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
                @if($errors->has('email'))
                    <span style="color:red">{{$errors->first('email')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="password">Mot de passe*</label>
                <input type="password" class="form-control" name="password"  placeholder="Passe">
                @if($errors->has('password'))
                    <span style="color:red">{{$errors->first('password')}}</span>
                @endif
                </div>
                <button type="submit" class="btn btn-success">Valider</button>
             </form>
        </div>
    </div>
</div>
@endsection