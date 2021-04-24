@extends('adminlte::page')

@section('title', 'Emails')

@section('content_header')
<h1>Emails</h1>
@stop

@section('content')
{{--Start Message --}}

@if(session('info'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>¡{{session('info')}}!</strong></p>
</div>
@endif
{{--End Message --}}

{{--Start List emails--}}
<div class="row">
    <div class="col-12">
        <a class="btn btn-warning" href="{{route('email.create')}}">Nuevo Email</a>
    </div>
</div>
<br />
<div class="row">
    <div class="col-12">
        @csrf
        <table class="table table-bordered" id="tabla">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Destinatario</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emails as $email)
                <tr>
                    <td> {{$email->id}} </td>
                    <td> {{$email->asunto}} </td>
                    <td> {{$email->destinatario}} </td>
                    <td> {{$email->mensaje }} </td>
                    @if($email->estado==1)
                    <td> Enviado </td>
                    @else
                    <td> No enviado </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--End List Users--}}
    
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabla').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@stop