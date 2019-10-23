@extends('layouts.includes.main-index')

@section('content')
       
<div class="row" style="margin-top:50px">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Produits</div>
            <div class="row" style="margin:10px;">
            @foreach($products as $product)
                <div class="col-md-4">
                    <a href="{{route('product.show',$product->id)}}">
                        <div class="thumbnail">
                            <img src="{{URL::to('/images/'.$product->image)}}" height="200" width="200" alt="...">
                            <div class="caption">
                                <h3>{{$product->titre}}</h3>
                                <p>{{$product->description}}</p>
                                <p><span class="label label-primary">{{$product->prix}} dh</span> <strike class="label label-danger"></strike></p>
                                <p><a href="{{route('product.show',['id'=>$product->id])}}" class="btn btn-primary" role="button">Voir</a></p>
                            </div>  
                        </div>
                    </a>
                </div>  
            @endforeach
            <div>
                {{$products->links()}}
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
             <div class="col-md-12">
                <div class="panel panel-primary">
                   <div class="panel-heading">Catégories</div>
                    <ul class="list-group">
                        @foreach($categories as $categorie)
                        <li class="list-group-item">
                            <span class="badge">{{$categorie->products->count()}}</span>
                            <a href="{{route('products.categorie',['categorie'=>$categorie->id])}}">{{$categorie->titre}}</a>
                        </li>
                        @endforeach
                    </ul>
                <div>
            </div>
        </div>
        <div class="row">
             <div class="col-md-12">
                <div class="panel panel-primary">
                   <div class="panel-heading">Les plus vendus</div>
                    <ul class="list-group">
                    @foreach($bestSold as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product->vendu}}</span>
                             <a href="{{route('product.show',['id'=>$product->id])}}">{{$product->titre}}</a>
                        </li>
                    @endforeach
                    </ul>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection