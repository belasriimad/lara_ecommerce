@extends('layouts.includes.admin-index')

@section('content')
<div class="form-group">
    <div class="pull-right">
        <a href="{{route('cat.create')}}" class="btn btn-primary" style="margin:5px;">Ajouter</a>
    </div>
</div>
<table class="table table-striped">
<tr>
    <th>Catégorie</th>
    <th>Action</th>
</tr> 
@foreach($categories as $categorie)  
<tr>
    <td>{{$categorie->titre}}</td>
    <td><a href="#updateModel{{$categorie->id}}" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i></a> <a href="{{route('categorie.delete',['id'=>$categorie->id])}}"><i class="glyphicon glyphicon-trash"></i></a></td>
    <div class="modal fade" id="updateModel{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier</h4>
        </div>
        <div class="modal-body">
             <form action="{{route('categorie.update',['id'=>$categorie->id])}}" method="post" class="" style="padding:10px" enctype="multipart/form-data">
                <div class="form-group">
                <label for="titre">Titre*</label>
                <input type="text" class="form-control" name="titre" placeholder="Titre" value="{{$categorie->titre}}">
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
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