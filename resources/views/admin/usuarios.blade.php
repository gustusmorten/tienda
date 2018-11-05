@extends('admin.template.adminTemplate')
@section('title','Usuarios')
@section('titleContent','Usuarios')
@section('contenido')
<h2>Administradores</h2>
<a href="{{ route('cliente.create') }}"  class="btn btn-primary">Registrar nuevo usuario</a>
<br>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->type == "admin")
                    <span class="label label-primary"> {{$user->type}}</span>
                    @else
                    <span class="label label-info"> {{$user->type}}</span>
                    @endif
                   </td>
                <td>
                    <a href="{{ route('user.destroy',$user->id) }}" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
{!!$users->links()!!}
</div>


<h2>Clientes</h2>
<br>
<table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($cliente as $clientes)
                <tr>
                    <td>{{$clientes->id}}</td>
                    <td>{{$clientes->name}}</td>
                    <td>{{$clientes->email}}</td>
                    <td>
                        @if ($clientes->type == "admin")
                        <span class="label label-primary"> {{$clientes->type}}</span>
                        @else
                        <span class="label label-info"> {{$clientes->type}}</span>
                        @endif
                       </td>
                    <td>
                        <a href="{{ route('cliente.destroy',$clientes->id) }}" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')">
                             <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('cliente.edit',$clientes->id) }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
    {!!$cliente->links()!!}
    </div>
@endsection
