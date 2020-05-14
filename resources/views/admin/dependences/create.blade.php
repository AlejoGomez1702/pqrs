{{-- *************************************************************** --}}
{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/edit-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('title', 'Editar Solicitante')

@section('content')
<div class="container-fluid">

    <div class="select-option">
            <div class="form-group">

                {{-- Particular --}}
                <div id="pa" class="particular text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Crear Nueva Dependencia
                    </div>                   

                    <div class="card-body">

                    {{-- Formulario para el ingreso de los datos --}}
                    {!! Form::open(['url' => '/dependences']) !!}            
                    @csrf

                    {{-- Nombre de la dependencia --}}
                    <div class="form-group">
                        <label>Nombre: *</label>
                        <input type="text" class="form-control" name="name" required  placeholder="Ingrese el nombre de la dependencia...">
                    </div>

                    {{-- Correo Electrónico --}}
                    <div class="form-group">
                        <label>Corre Electrónico: </label>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese el correo electrónico de la dependencia (opcional)">
                    </div>

                    {{-- Celular --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Celular: </label>
                        <input type="text" class="form-control" name="cellphone" id="exampleInputPassword1" placeholder="Ingrese número celular de la entidad (opcional)">
                    </div>

                    <div class="btn-aln btn-group">                            
                        {{-- <button type="button" class="btn-size d-inline btn btn-danger"><a style="color:white;" href="/entities">Cancelar</a></button> --}}
                        <button type="submit" class="btn-size d-inline btn btn-success">Registrar</button>
                    </div>

                    {!! Form::close() !!}
                    </div>
            </div>
    </div>
</div>    
@endsection

