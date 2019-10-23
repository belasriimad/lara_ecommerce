@extends('layouts.includes.admin-index')

@section('content')
       
<div class="row" style="margin-top:50px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Ajouter un produit</div>
             <form action="{{route('product.add')}}" method="post" class="" style="padding:10px" enctype="multipart/form-data">
                <div class="form-group">
                <label for="titre">Titre*</label>
                <input type="text" class="form-control" name="titre" placeholder="Titre">
                @if($errors->has('titre'))
                    <span style="color:red">{{$errors->first('titre')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="desc">Déscription*</label>
                <textarea name="desc" id=""  class="form-control" placeholder="Description" cols="30" rows="10"></textarea>
                @if($errors->has('desc'))
                    <span style="color:red">{{$errors->first('desc')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="qte">Qté*</label>
                <input type="text" class="form-control" name="qte" placeholder="Qté">
                @if($errors->has('qte'))
                    <span style="color:red">{{$errors->first('qte')}}</span>
                @endif
                </div>
                <div class="form-group">
                <label for="prix">Prix*</label>
                <input type="number" class="form-control" name="prix" placeholder="Prix">
                @if($errors->has('prix'))
                    <span style="color:red">{{$errors->first('prix')}}</span>
                @endif
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                <label for="image">Image*</label>
                <input type="file" name="file">
                @if($errors->has('file'))
                    <span style="color:red">{{$errors->first('file')}}</span>
                @endif
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
             </form>
        </div>
    </div>
</div>
@endsection