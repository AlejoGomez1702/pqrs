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
                        Editar Solicitante Particular
                    </div>                   

                    <div class="card-body">

                        {!! Form::model($entity, ['route' => ['entities.update', $entity->id], 'method' => 'patch']) !!}
                        {{-- Nombre --}}
                        <div class="form-group">
                            <label>Nombre: *</label>
                            {!! Form::text('name',null, ['class' => 'form-control', 
                                    'placeholder' => 'Nombre de la entidad', 'name' => 'name']) !!}   
                        </div>

                        {{-- NIT --}}
                        <div class="form-group">
                            <label>NIT: *</label>
                            {!! Form::text('nit',null, ['class' => 'form-control', 
                                    'placeholder' => 'NIT de la entidad', 'name' => 'nit']) !!}   
                        </div>

                        {{-- Celular --}}
                        <div class="form-group">
                            <label>Celular: </label>
                            {!! Form::number('cellphone',null, ['class' => 'form-control', 
                                    'placeholder' => 'Celular de la entidad (opcional)', 'name' => 'cellphone']) !!}   
                        </div>

                        {{-- Correo Electrónico --}}
                        <div class="form-group">
                            <label>Correo Electrónico: </label>
                            {!! Form::text('email',null, ['class' => 'form-control', 
                                    'placeholder' => 'Correo electrónico de la entidad (opcional)', 'name' => 'email']) !!}   
                        </div>

                        <div class="btn-aln btn-group">                            
                            <button type="button" class="btn-size d-inline btn btn-danger"><a style="color:white;" href="/entities">Cancelar</a></button>
                            <button type="submit" class="btn-size d-inline btn btn-success">Aceptar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
</div>    
@endsection
