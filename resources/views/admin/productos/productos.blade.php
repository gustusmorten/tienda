@extends('admin.template.adminTemplate')
@section('title','Productos')
@section('titleContent','Productos')

@section('contenido')

<a href="{{ route('producto.create') }}"  class="btn btn-primary">Registrar un nuevo producto</a><br>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acción</th>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>${{$producto->precio}}</td>
                <td>
                    <a href="{{ route('producto.destroy',$producto->id) }}" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('producto.edit',$producto->id) }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                 </td>

            </tr>
        @endforeach
    </tbody>
</table>
{!!$productos->links()!!}
@endsection
