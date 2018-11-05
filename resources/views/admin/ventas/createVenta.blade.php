@extends('admin.template.adminTemplate')
@section('title','Ventas')
@section('titleContent')
Nueva venta: {!! Form::label('fecha',\Carbon\Carbon::now()->toFormattedDateString() ) !!}
@endsection

@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route'=>'venta.store', 'method'=>'POST', 'files'=>true, 'onChange'=>'getHouseModel']) !!}

<div class="form-group">
    {!! Form::label('tienda','Tienda')!!}
    {!! Form::select('tienda_id',$tiendas,null,['class'=>'form-control','placeholder'=>'Tienda','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('cliente','Cliente')!!}
    {!! Form::select('cliente_id',$usuarios,null,['class'=>'form-control','placeholder'=>'Cliente','required']) !!}
</div>


<div class="form-group">
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

                                   <a href="{{ route('venta.add',$producto->id) }}" class="btn btn-success">
                                       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                   </a>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
{!!$productos->links()!!}
<h4>Carrito</h4>
<a href="{{ route('venta.clearCart','1') }}"  class="btn btn-primary">Limpiar carrito</a>
            <div class="form-group">
                    <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($cartProducts as $producto)
                                    <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->name}}</td>
                                        <td>${{$producto->price}}</td>
                                        <td>{{$producto->quantity}}</td>
                                        <td>${{$producto->quantity*$producto->price}}</td>
                                        <td>

                                               <a href="{{ route('venta.less',$producto->id) }}" class="btn btn-warning">
                                                   <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                               </a>
                                               <a href="{{ route('venta.delete',$producto->id) }}" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                                </a>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    <div class="form-group">
                        <h4>Total de productos: {{$cartTotalProducts}} </h4>
                    </div>
    <div class="form-group">
                        <h4>Total: ${{$cartTotal}}</h4>
    </div>

<div class="form-group">
    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection
