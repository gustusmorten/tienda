@extends('admin.template.adminTemplate')
@section('title','Tiendas')
@section('titleContent','Crear Tienda')

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
{!! Form::open(['route'=>'tienda.store', 'method'=>'POST']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion','Dirección')!!}
    {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
