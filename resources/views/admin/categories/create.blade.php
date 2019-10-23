@extends('layouts.includes.admin-index')

@section('content')
       
<div class="row" style="margin-top:50px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Ajouter une catégorie</div>
             <form action="{{route('categorie.add')}}" method="post" class="" style="padding:10px">
                <div class="form-group">
                <label for="firstname">Catégorie*</label>
                   <input type="text" class="form-control" name="name" placeholder="Catégorie">
                   @if($errors->has('name'))
                      <span style="color:red">{{$errors->first('name')}}</span>
                   @endif
                   <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
             </form>
        </div>
    </div>
</div>
@endsection