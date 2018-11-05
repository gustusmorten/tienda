@extends('layouts.shopTemplate')
@section('title','Lobo Shop')

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

{!! Form::open(['route'=>'shopingCart.store', 'method'=>'POST', 'files'=>true, 'onChange'=>'getHouseModel']) !!}

<div class="form-group">
        {!! Form::label('cliente',"Cliente: ".$userId = auth()->user()->name )!!}

    </div>
<div class="form-group">
    {!! Form::label('tienda','Tienda')!!}
    {!! Form::select('tienda_id',$tiendas,null,['class'=>'form-control','placeholder'=>'Tienda','required']) !!}
</div>




<h4>Carrito</h4>
<a href="{{ route('shopingCart.clearCart','1') }}"  class="btn btn-primary">Limpiar carrito</a>
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
                                        <td>
                                            <a href="{{ route('shopingCart.less',$producto->id) }}" class="btn btn-warning">
                                                 <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                            </a>
                                            <a class="btn" > {{$producto->quantity}} </a>
                                            <a href="{{ route('shopingCart.add',$producto->id) }}" class="btn btn-success">
                                                 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                             </a>

                                        </td>
                                        <td>${{$producto->quantity*$producto->price}}</td>
                                        <td>


                                               <a href="{{ route('shopingCart.delete',$producto->id) }}" class="btn btn-danger">
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
