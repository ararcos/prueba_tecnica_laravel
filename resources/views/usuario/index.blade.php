@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Datos Personales</h1>
@stop

@section('content')
    <b>Nombre:</b> <?php echo $usuario->nombre ?> <br/>
    <b>Cedula:</b> <?php echo $usuario->cedula ?> <br/>
    <b>Email:</b> <?php echo $usuario->email ?> <br/>
    <b>Numero de Telefono:</b> <?php echo $usuario->numero?$usuario->numero:"no existe" ?> <br/>
    <b>Ciudad:</b> <?php echo $usuario->ciudad ?> <br/>
    <b>Fecha de Nacimiento:</b> <?php echo $usuario->fecha_nacimiento ?> <br/>
    <b>Edad:</b> <?php echo $usuario->edad ?> <br/>
@stop


