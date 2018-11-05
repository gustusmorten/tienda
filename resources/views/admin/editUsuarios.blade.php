@extends('admin.template.adminTemplate')
@section('title','Usuarios')
@section('titleContent','Editar usuario: '.$user->name .".")

@section('contenido')

{!! Form::open(['route'=>['user.update',$user->id], 'method'=>'PUT']) !!}

<div class="form-group">
    {!! Form::label('nombre','Nombre')!!}
    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email')!!}
    {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
</div>



<div class="form-group">
    {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}


</div>

{!! Form::close() !!}
@endsection
