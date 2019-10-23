@extends('layouts.includes.admin-index')

@section('content')
<div class="form-group">
    <div class="pull-right">
        <a href="{{url('admin/product/add')}}" class="btn btn-primary" style="margin:5px;">Ajouter</a>
    </div>
</div>
<table class="table table-striped">
<tr>
    <th>Titre</th>
    <th>Description</th>
    <th>Prix</th>
    <th>Qté</th>
    <th>Image</th>
    <th>Action</th>
</tr> 
@foreach($products as $product)
<tr>
    <th>{{$product->titre}}</th>
    <th>{{$product->description}}</th>
    <th>{{$product->prix}}</th>
    <th>{{$product->qte}}</th>
    <th><img src="{{URL::to('/images/'.$product->image)}}" height="50" width="50"></th>
    <th><a href="#updateModel{{$product->id}}" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i></a> <a href="{{route('admin.products.delete',['id'=>$product->id])}}"><i class="glyphicon glyphicon-trash"></i></a></th>
    <div class="modal fade" id="updateModel{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier</h4>
        </div>
        <div class="modal-body">
             <form action="{{route('admin.product.update',['id'=>$product->id])}}" method="post" class="" style="padding:10px" enctype="multipart/form-data">
                <div class="form-group">
                <label for="titre">Titre*</label>
                <input type="text" class="form-control" name="titre" placeholder="Titre" value="{{$product->titre}}">
                </div>
                <div class="form-group">
                <label for="desc">Déscription*</label>
                <textarea name="desc" id=""  class="form-control" placeholder="Description" cols="30" rows="10">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                <label for="qte">Qté*</label>
                <input type="text" class="form-control" name="qte" placeholder="Qté" value="{{$product->qte}}">
                </div>
                <div class="form-group">
                <label for="prix">Prix*</label>
                <input type="number" class="form-control" name="prix" placeholder="Prix" value="{{$product->prix}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <button type="submit" class="btn btn-success">Modifier</button>
             </form>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</tr> 
@endforeach                                   
</table>
@endsection