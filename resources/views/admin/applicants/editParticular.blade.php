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

                        {!! Form::model($applicant, ['route' => ['applicants.update', $applicant->id], 'method' => 'patch']) !!}
                        {{-- Cédula --}}
                        <div class="form-group">
                            <label>Cédula: *</label>
                            {!! Form::text('identification_card',null, ['class' => 'form-control', 
                                    'placeholder' => 'Número de Cédula', 'name' => 'identification_card']) !!}   
                        </div>

                        {{-- Nombres --}}
                        <div class="form-group">
                            <label>Nombres: *</label>
                            {!! Form::text('names',null, ['class' => 'form-control', 
                                    'placeholder' => 'Nombres del solicitante', 'name' => 'names']) !!}   
                        </div>

                        {{-- Apellidos --}}
                        <div class="form-group">
                            <label>Apellidos: *</label>
                            {!! Form::text('surnames',null, ['class' => 'form-control', 
                                    'placeholder' => 'Apellidos del solicitante', 'name' => 'surnames']) !!}   
                        </div>

                        {{-- Correo Electrónico --}}
                        <div class="form-group">
                            <label>Correo Electrónico: </label>
                            {!! Form::text('email',null, ['class' => 'form-control', 
                                    'placeholder' => 'Correo del solicitante (opcional)', 'name' => 'email']) !!}   
                        </div>

                        {{-- Celular --}}
                        <div class="form-group">
                            <label>Celular: </label>
                            {!! Form::number('cellphone',null, ['class' => 'form-control', 
                                    'placeholder' => 'Celular del solicitante (opcional)', 'name' => 'cellphone']) !!}   
                        </div>

                        <div class="btn-aln btn-group">                            
                            <button type="button" class="btn-size d-inline btn btn-danger"><a style="color:white;" href="/applicants">Cancelar</a></button>
                            <button type="submit" class="btn-size d-inline btn btn-success">Aceptar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
    

</div>    
@endsection
