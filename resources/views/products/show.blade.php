@extends('layouts.includes.main-index')

@section('content')
       
<div class="row" style="margin-top:50px">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Produits</div>
            <div class="row" style="margin:10px;">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="thumbnail">
                        <img src="{{URL::to('/images/'.$product->image)}}" alt="...">
                        <div class="caption">
                            <h3 class="text-center">{{$product->titre}}</h3>
                            <p class="text-center">{{$product->description}}</p>
                            <p class="text-center"><span class="label label-primary">{{$product->prix}} dh</span> <strike class="label label-danger"></strike></p>
                            <form action="{{route('product.add.cart')}}" method="post" class="text-center">
                                <div class="form-group">
                                    <label for="qte">Qté</label>
                                    <input type="text" size="1" name="qte" value="1">
                                    <input type="hidden"  name="id" value="{{$product->id}}">
                                    <input type="hidden"  name="titre" value="{{$product->titre}}">
                                    <input type="hidden"  name="prix" value="{{$product->prix}}">
                                    <input type="hidden"  name="_token" value="{{csrf_token()}}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success">Ajouter au panier</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection