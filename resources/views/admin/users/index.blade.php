@extends('layouts.includes.admin-index')

@section('content')
<table class="table table-striped">
<tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Email</th>
    <th>Ville</th>
    <th>Status</th>
    <th>Action</th>
</tr>    
@foreach($users as $user)
<tr>
    <td>{{$user->nom}}</td>
    <td>{{$user->prenom}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->ville}}</td>
    <td>{{$user->is_admin ? 'admin' : 'inscrit'}}</td>
    <td> 
    <a href="{{route('admin.user.delete',['id'=>$user->id])}}"><i class="glyphicon glyphicon-trash"></i></a>
    @if(!$user->is_admin)
    <a href="{{route('user.update',['id'=>$user->id])}}" title="Désigner admin"><i class="glyphicon glyphicon-user"></i></a>
    @else
    <a href="{{route('user.remove',['id'=>$user->id])}}" title="Retirer admin"><i class="glyphicon glyphicon-user"></i></a>
    </td>
    @endif
</tr> 
@endforeach                               
</table>
@endsection