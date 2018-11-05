@extends('admin.template.adminTemplate')
@section('title','Tiendas')
@section('titleContent','Tiendas')
@section('contenido')

<a href="{{ route('tienda.create') }}"  class="btn btn-primary">Registrar nueva tienda</a><br>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Acción</th>
    </thead>
    <tbody>
        @foreach ($tiendas as $tienda)
            <tr>
                <td>{{$tienda->id}}</td>
                <td>{{$tienda->nombre}}</td>
                <td>{{$tienda->direccion}}</td>
                <td>
                    <a href="{{ route('tienda.destroy',$tienda->id) }}" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('tienda.edit',$tienda->id) }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                 </td>

            </tr>
        @endforeach
    </tbody>
</table>
{!!$tiendas->links()!!}
@endsection
