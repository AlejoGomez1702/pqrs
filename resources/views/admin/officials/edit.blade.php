{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/create-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="text-center">Editar Datos Del Funcionario</h3>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    {!! Form::model($official, ['route' => ['officials.update', $official->id], 
                                                    'files' => true, 'method' => 'patch']) !!}
                    {{-- Cédula --}}
                    <div class="input-container">
                        <i class="far fa-id-card icon"></i>
                        {!! Form::text('identification_card',null, ['class' => 'input-field', 
                                'placeholder' => 'Número de Cédula', 'name' => 'identification_card']) !!}   
                    </div>

                    {{-- Nombres --}}
                    <div class="input-container">
                        <i class="fas fa-signature icon"></i>
                        {!! Form::text('names',null, ['class' => 'input-field', 
                                    'placeholder' => 'Nombres', 'name' => 'names']) !!}
                    </div>

                    {{-- Apellidos --}}
                    <div class="input-container">
                        <i class="fas fa-signature icon"></i>
                        {!! Form::text('surnames',null, ['class' => 'input-field', 
                                    'placeholder' => 'Apellidos', 'name' => 'surnames']) !!}                            
                    </div>

                    {{-- Correo Electrónico --}}
                    <div class="input-container">
                        <i class="fas fa-envelope-open-text icon"></i>
                        {!! Form::email('email',null, ['class' => 'input-field', 
                                    'placeholder' => 'Correo Electrónico', 'name' => 'email']) !!}
                    </div>

                    {{-- Foto del funcionario --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Subir Foto</span>
                        </div>
                        <div class="custom-file">
                            {!! Form::file('photo', ['class' => 'custom-file-input', 'id' => 'inputGroupFile01', 
                                            'aria-describedby' => "inputGroupFileAddon01", 'accept' => "image/*"]) !!}                        
                        {{-- <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> --}}
                        <label class="custom-file-label" for="inputGroupFile01">Seleccionar...</label>
                        </div>
                    </div>

                    {{-- Botones del formulario --}}
                    <div class="row mt-4">
                        <div class="col">                                
                            <a class="btn btn-light" href="/officials">
                                <i class="fa fa-chevron-left mr-md-3" aria-hidden="true"></i> 
                                ATRAS
                            </a>
                        </div>
                        <div class="col" >
                            {!! Form::button('ACTUALIZAR <i class="fa fa-plus ml-md-3" aria-hidden="true"></i>',
                                ['type' => 'submit', 'class' => 'btn btn-primary float-right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                </div>

            </div>
        </div>
    </div>
</div>    
@endsection