@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Usuarios</h1>
@stop

@section('content')
{{--Start Edit Modal --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('usuario.update')}}" method="POST">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" , name="id" id="id" value="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su nombre" value="{{old('nombre')}}">
                        @error('nombre')
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send message</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--End Edit Modal--}}

{{--Start Delete Modal --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Esta Seguro que desea eliminar este registro </p>
            </div>
            <div class="modal-footer">
                <form action="{{route('usuario.delete')}}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="hidden" , name="user_id" id="user_id" value="">
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{--End Delete Modal--}}

{{--Start Message List Errors--}}

@if ($errors->any())
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>¡A ocurrido un error!</strong></p>
    @error('nombre')
    <small>*{{$message}}</small><br/>
    @enderror
    @error('fecha')
    <small>*{{$message}}</small><br/>
    @enderror
    @error('ciudad')
    <small>*{{$message}}</small><br/>
    @enderror
    @error('numero')
    <small>*{{$message}}</small><br/>
    @enderror
</div>
@endif
{{--End Message List Errors--}}

{{--Start List Users--}}
<div class="row">
    <div class="col-12">
        <a class="btn btn-warning" href="{{route('usuario.create')}}">Nuevo</a>
    </div>
</div>
<br />
<form class="form-inline">
    <select name="tipo" class="form-control mr-sm-2">
        <option value="0">Buscar por tipo</option>
        <option value="nombre">Nombre</option>
        <option value="cedula">Cedula</option>
        <option value="email">Email</option>
        <option value="celular">Celular</option>
    </select>
    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Juan Perez" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
<br />
<div class="row">
    <div class="col-12">
        @csrf
        <table class="table table-bordered" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Email</th>
                    <th scope="col">Numero de Telefono</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Edad</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td> {{$usuario->id}} </td>
                    <td> {{$usuario->nombre}} </td>
                    <td> {{$usuario->cedula}} </td>
                    <td> {{$usuario->email }} </td>
                    <td> {{$usuario->numero}} </td>
                    <td> {{$usuario->ciudad}} </td>
                    <td> {{$usuario->edad}} </td>
                    <td>
                        <a class="btn btn-success edit" data-user="{{$usuario}}" href="#">Editar</a>
                        <a class="btn btn-danger delete" data-user-id="{{$usuario->id}}" href="#"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}
    </div>
</div>
{{--End List Users--}}
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabla').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
        $(".delete").click(function() {
            var userID = $(this).attr('data-user-id');
            $('#user_id').val(userID);
            $('#deleteModal').modal('show');
        });

        $(".edit").click(function() {
            var user = $(this).attr('data-user');
            var obj = $.parseJSON(user);
            var fecha = new Date(obj["fecha"])
            $('#id').val(obj["id"]);
            $('#numero').val(obj["numero"]);
            $("#ciudad").empty();
            $("#ciudad").append("<option>" + obj["ciudad"] + "</option>");
            $('#fecha').val(fecha);
            $('#nombre').val(obj["nombre"]);
            $('#editModal').modal('show');
        });

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
                        console.log(respuesta[i].nombre)
                        $("#ciudad").append("<option value='" + respuesta[i].nombre + "'>" +
                            respuesta[i].nombre + "</option>");
                    }
                }
            });
        });
    });
</script>
@stop