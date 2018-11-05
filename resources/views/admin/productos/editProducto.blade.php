@extends('admin.template.adminTemplate')
@section('title','Productos')
@section('titleContent','Editar producto: '.$producto->nombre.".")

@section('contenido')

{!! Form::open(['route'=>['producto.update',$producto->id], 'method'=>'PUT']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('nombre',$producto->nombre,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion','Dirección')!!}
    {!! Form::text('direccion',$producto->costo,['class'=>'form-control','placeholder'=>'$0.00','required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
