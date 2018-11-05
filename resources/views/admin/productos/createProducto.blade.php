@extends('admin.template.adminTemplate')
@section('title','Productos')
@section('titleContent','Crear producto')

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
{!! Form::open(['route'=>'producto.store', 'method'=>'POST', 'files'=>true]) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('costo','Costo')!!}
    {!! Form::number('precio',null,['class'=>'form-control','placeholder'=>'$0.00','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('image','Imagen')!!}
    {!! Form::file('image') !!}
</div>
<div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
