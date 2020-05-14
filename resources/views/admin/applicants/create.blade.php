{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/create-styles.css') }}" rel="stylesheet" >    
@endpush

@push('custom-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/applicants.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Nuevo Solicitante')

@section('content')
<div class="container-fluid">
    <div class="select-option">
            <div class="form-group">
                <div class="text-center">
                    <label>Seleccione el tipo de solicitante que desea registrar:</label>
                    <select class="custom-select center-select" id="selectBox" onchange="enableSection()">
                    <option value="1">Entidad Pública</option>
                    <option value="2">Entidad Privada</option>
                    <option value="3">Persona Particular</option>
                    </select>                    
                </div>                

                {{-- Entidad pública --}}
                <div id="pu" class="public-entity text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Nueva Entidad Pública
                    </div>
                    {!! Form::open(['url' => '/entities']) !!}
                    <input type="hidden" id="custId" name="entityId" value="1">
                    <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre: *</label>
                          <input type="text" class="form-control" name="name" required id="exampleInputEmail1" placeholder="Ingrese el nombre de la entidad">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">NIT: *</label>
                          <input type="text" class="form-control" name="nit" required id="exampleInputPassword1" placeholder="Ingrese el NIT de la entidad">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Celular: </label>
                            <input type="text" class="form-control" name="cellphone" id="exampleInputPassword1" placeholder="Ingrese número celular de la entidad (opcional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Corre Electrónico: </label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese el correo electrónico de la entidad (opcional)">
                        </div>
                        <div class="btn-size">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                {{-- Entidad privada --}}
                <div id="pr" class="private-entity text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Nueva Entidad Privada
                    </div>
                    {!! Form::open(['url' => '/entities']) !!}
                    <input type="hidden" id="custId" name="entityId" value="2">
                    <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre: *</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="name" required placeholder="Ingrese el nombre de la entidad">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">NIT: *</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="nit" required placeholder="Ingrese el NIT de la entidad">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Celular: </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="cellphone" placeholder="Ingrese número celular de la entidad (opcional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Corre Electrónico: </label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese el correo electrónico de la entidad (opcional)">
                        </div>
                        <div class="btn-size">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                {{-- Particular --}}
                <div id="pa" class="particular text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Nuevo Solicitante Particular
                    </div>
                    {!! Form::open(['url' => '/applicants']) !!}
                    <input type="hidden" id="custId" name="entityId" value="3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cédula: *</label>
                            <input type="text" class="form-control" name="identification_card" placeholder="Ingrese la cédula del solicitante">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombres: *</label>
                          <input type="text" class="form-control" name="names" placeholder="Ingrese los nombres del solicitante">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Apellidos: *</label>
                          <input type="text" class="form-control" name="surnames" placeholder="Ingrese los apellidos del solicitante">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Correo Electrónico: </label>
                            <input type="email" class="form-control"name="email" placeholder="Ingrese el correo del solicitante (opcional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Celular: </label>
                            <input type="number" class="form-control" name="cellphone" placeholder="Ingrese el número celular del solicitante (opcional)">
                        </div>
                        <div class="btn-size">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
    

</div>    
@endsection
