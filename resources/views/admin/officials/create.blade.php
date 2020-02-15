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
                    <h3 class="text-center">Agregar Nuevo Funcionario</h3>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    @if ($type == 'create')
                        {{-- Formulario para el ingreso de los datos --}}
                        {!! Form::open(['url' => 'officials']) !!}
                    @endif                    
                    @csrf
                        {{-- Cédula --}}
                        <div class="input-container">
                            <i class="far fa-id-card icon"></i>
                            {!! Form::text('text',null, ['class' => 'input-field', 
                                        'placeholder' => 'Número de Cédula', 'name' => 'identification_card']) !!}   
                        </div>

                        {{-- Nombres --}}
                        <div class="input-container">
                            <i class="fas fa-signature icon"></i>
                            {!! Form::text('text',null, ['class' => 'input-field', 
                                        'placeholder' => 'Nombres', 'name' => 'names']) !!}
                        </div>

                        {{-- Apellidos --}}
                        <div class="input-container">
                            <i class="fas fa-signature icon"></i>
                            {!! Form::text('text',null, ['class' => 'input-field', 
                                        'placeholder' => 'Apellidos', 'name' => 'surnames']) !!}                            
                        </div>

                        {{-- Correo Electrónico --}}
                        <div class="input-container">
                            <i class="fas fa-envelope-open-text icon"></i>
                            {!! Form::email('email',null, ['class' => 'input-field', 
                                        'placeholder' => 'Correo Electrónico', 'name' => 'email']) !!}
                        </div>

                        {{-- Contraseña --}}
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            {!! Form::password('password', ['class' => 'input-field',
                                        'placeholder' => 'Contraseña']); !!}                            
                        </div>

                        {{-- Confirmar Contraseña --}}
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            {!! Form::password('password_confirmation', ['class' => 'input-field',
                                        'placeholder' => 'Confirmar Contraseña']); !!}                            
                        </div>

                        {{-- Botones del formulario --}}
                        <div class="row mt-4">
                            <div class="col">                                
                                <a class="btn btn-light" >
                                    <i class="fa fa-chevron-left mr-md-3" aria-hidden="true"></i> 
                                    ATRAS
                                </a>
                            </div>
                            <div class="col" >
                                {!! Form::button('AGREGAR <i class="fa fa-plus ml-md-3" aria-hidden="true"></i>',
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
