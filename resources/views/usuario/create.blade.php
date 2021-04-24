@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
<h1>Crear Nuevo Usuario</h1>
@stop

@section('content')
<form action="{{route('usuario.store')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su nombre" value="{{old('nombre')}}">
            @error('nombre')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Ingrese su cedula" value="{{old('cedula')}}">
            @error('cedula')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" value="{{old('email')}}">
            @error('email')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="numero">Telefono</label>
            <input type="text" name="numero" class="form-control" id="numero" placeholder="Ingrese su telefono" value="{{old('numero')}}">
            @error('numero')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Pais</label>
            <select class="form-control" name="pais" id="pais">
                <option>Seleccione</option>
                @foreach($paises as $pais)
                <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option>Seleccione</option>
            </select>
        </div>
        <div class="form-group">
            <label>Ciudad</label>
            <select class="form-control" name="ciudad" id="ciudad">
            </select>
            @error('ciudad')
            <small>*{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha">Fecha Nacimiento</label>
            <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Ingrese su fecha de nacimiento" value="{{old('fecha')}}">
            @error('fecha')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese su contraseña" value="{{old('password')}}" >
            @error('password')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirma la constraseñas" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
            <small>*{{$message}}</small>
            @enderror
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
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