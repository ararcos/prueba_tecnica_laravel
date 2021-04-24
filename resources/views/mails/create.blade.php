@extends('adminlte::page')

@section('title', 'Enviar Correo')

@section('content_header')
<h1>Nuevo Correo</h1>
@stop

@section('content')
<form action="{{route('email.enviar')}}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="asunto">Asunto</label>
            <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Ingrese su asunto" value="{{old('asunto')}}">
            @error('asunto')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="destinatario">Destinatario</label>
            <input type="email" name="destinatario" class="form-control" id="destinatario" placeholder="ejemplo@ejemplo.com" value="{{old('destinatario')}}">
            @error('destinatario')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <input type="texarea" name="mensaje" class="form-control" id="mensaje" placeholder="Ingrese su mensaje" value="{{old('mensaje')}}">
            @error('mensaje')
            <small>*{{$message}}</small>
            @enderror
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
@stop


@section('js')
<script>
    $(document).ready(function() {
        $("#pais").change(function(event) {
            $("#estado").empty();
            $("#estado").append("<option> Seleccione </option>");
            $("#ciudad").empty();
            var id = event.target.value;
            $.ajax({
                url: "{{URL('/')}}" + "/estados" + "/" + id,
                type: "GET",
                dataType: "json",
                error: function(element) {
                    console.log(element.type);
                },
                success: function(respuesta) {
                    for (i = 0; i < respuesta.length; i++) {
                        $("#estado").append("<option value='" + respuesta[i].id + "'>" +
                            respuesta[i].nombre + "</option>");
                    }
                }
            });
        });
        $("#estado").change(function(event) {
            var id = event.target.value;
            $("#ciudad").empty();
            $.ajax({
                url: "{{URL('/')}}" + "/ciudades" + "/" + id,
                type: "GET",
                dataType: "json",
                error: function(element) {
                    console.log(element.type);
                },
                success: function(respuesta) {
                    for (i = 0; i < respuesta.length; i++) {
                        $("#ciudad").append("<option value='" + respuesta[i].nombre + "'>" +
                            respuesta[i].nombre + "</option>");
                    }
                }
            });
        });
    });
</script>
@stop