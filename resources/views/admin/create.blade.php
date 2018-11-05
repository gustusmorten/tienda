@extends('admin.template.adminTemplate')
@section('title','Usuarios')
@section('titleContent','Nuevo Usuario')

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
{!! Form::open(['route'=>'cliente.store', 'method'=>'POST']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email')!!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('password','Contraseña')!!}
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'*******','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type','Tipo')!!}
    {!! Form::select('type',['cliente' => 'Cliente','admin'=>'Administrador'],null,['class'=>'form-control','placeholder'=>'Tipo de usuario','required']) !!}

</div>

<div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
