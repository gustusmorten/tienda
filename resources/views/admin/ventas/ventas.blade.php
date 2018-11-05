@extends('admin.template.adminTemplate')
@section('title','Ventas')
@section('titleContent','Ventas')

@section('contenido')

<a href="{{ route('venta.create') }}"  class="btn btn-primary">Registrar una nueva venta</a><br>
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Fecha</th>
        <th>Usuario</th>
        <th>Tienda</th>
        <th>Productos</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
        <th>Acción</th>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
            <tr>
                <td>{{$venta->id}}</td>

                <td>{{$venta->fecha}}</td>

                 @if ($venta->cliente==null)
                     <td>-------</td>
                 @else
                     <td>{{$venta->cliente->name}}</td>
                 @endif

                 @if ($venta->tienda==null)
                     <td>-------</td>
                 @else
                     <td>{{$venta->tienda->nombre}}</td>
                 @endif


                 @forelse ($venta->detalle->detallesProductos as $producto)
                 <td>
                         {{$producto->producto->nombre}}
                         <br>
                 </td>
                 <td>
                        {{$producto->cantidad}}
                        <br>
                 </td>
                 <td>
                        ${{$producto->producto->precio}}
                         <br>
                  </td>
                 @empty
                 <td>-------</td>
                 <td>-------</td>
                 <td>-------</td>
                 @endforelse
                <td>

                        ${!! $venta->detalle->total !!}
                        <?php $total = $total + $venta->detalle->total; ?>

                </td>
                <td>
                    <a href="{{ route('venta.destroy',$venta->id) }}" class="btn btn-danger" onclick="return confirm('¿Estas seguro?')">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>

                 </td>

            </tr>
        @endforeach
    </tbody>
</table>
<div >
    <h4> Total de las ventas: ${!! $total !!} </h4>
</div>
{!!$ventas->links()!!}
@endsection
