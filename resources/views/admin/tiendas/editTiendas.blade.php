@extends('admin.template.adminTemplate')
@section('title','Tiendas')
@section('titleContent','Editar tienda: '.$tienda->nombre.".")

@section('contenido')

{!! Form::open(['route'=>['tienda.update',$tienda->id], 'method'=>'PUT']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('nombre',$tienda->nombre,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion','Dirección')!!}
    {!! Form::text('direccion',$tienda->direccion,['class'=>'form-control','placeholder'=>'Dirección','required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
