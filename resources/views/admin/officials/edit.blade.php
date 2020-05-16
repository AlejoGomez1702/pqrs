{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/edit-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('title', 'Editar Funcionario')

@section('content')
<div class="container-fluid">
    <div class="select-option">
            <div class="form-group">

                <div class="particular text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Editar Funcionario
                    </div>                   

                    <div class="card-body">
                        {{-- ****************************************************** --}}
                        {{-- {!! Form::open(['route' => ['officials.update', $official->id], 
                        'method' => 'patch']) !!}  --}}
                        {!! Form::model($official, ['route' => ['officials.update', $official->id], 
                                                     'method' => 'patch']) !!}         
                        @csrf
                            {{-- Cédula --}}
                            <div class="form-group">
                                <label>Cédula: *</label>
                                <input type="text" name="identification_card" class="form-control" placeholder="Número de Cédula" value="{{ $official->identification_card }}">
                                {{-- {!! Form::text('text',null, ['class' => 'form-control', 'placeholder' => 'Número de Cédula', 
                                    'name' => 'identification_card', 'value' => $official->identification_card]) !!}    --}}
                            </div>

                            {{-- Dependencia --}}
                            <div class="form-group">
                                <label>Dependencia: *</label>
                                <select class="form-control" name="dependence_id">
                                  <option value="{{ $official->dependence->id }}" selected>{{ $official->dependence->name }}</option>
                                  @foreach ($dependences as $dependence)
                                    <option value="{{ $dependence->id }}">{{ $dependence->name }}</option>
                                  @endforeach                              
                                </select>
                            </div>
    
                            {{-- Nombres --}}
                            <div class="form-group">
                                <label>Nombres: *</label>
                                <input type="text" name="names" class="form-control" placeholder="Nombres del funcionario" value="{{ $official->names }}">
                                {{-- {!! Form::text('text',null, ['class' => 'form-control', 
                                            'placeholder' => 'Nombres', 'name' => 'names']) !!} --}}
                            </div>
    
                            {{-- Apellidos --}}
                            <div class="form-group">
                                <label>Apellidos: *</label>
                                <input type="text" name="surnames" class="form-control" placeholder="Apellidos del funcionario" value="{{ $official->surnames }}">
                                {{-- {!! Form::text('text',null, ['class' => 'form-control', 
                                            'placeholder' => 'Apellidos', 'name' => 'surnames']) !!}                             --}}
                            </div>
    
                            {{-- Correo Electrónico --}}
                            <div class="form-group">
                                <label>Correo Electrónico: *</label>
                                {!! Form::email('email',null, ['class' => 'form-control', 
                                            'placeholder' => 'Correo Electrónico', 'name' => 'email']) !!}
                            </div>
    
                            {{-- Contraseña --}}
                            <div class="form-group">
                                <label>Contraseña: *</label>
                                {!! Form::password('password', ['class' => 'form-control',
                                            'placeholder' => 'Contraseña']); !!}                            
                            </div>
    
                            {{-- Confirmar Contraseña --}}
                            <div class="form-group">
                                <label>Confirmar Contraseña: *</label>
                                {!! Form::password('password_confirmation', ['class' => 'form-control',
                                            'placeholder' => 'Confirmar Contraseña']); !!}                            
                            </div>
    
                            {{-- Foto del funcionario --}}
                            {{-- <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Subir Foto</span>
                                </div>
                                <div class="custom-file">
                                    {!! Form::file('photo', ['class' => 'custom-file-input', 'id' => 'inputGroupFile01', 
                                                    'aria-describedby' => "inputGroupFileAddon01", 'accept' => "image/*"]) !!}                        
                                  
                                  <label class="custom-file-label" for="inputGroupFile01">Seleccionar...</label>
                                </div>
                            </div> --}}
    
                            {{-- Botones del formulario --}}
                            <div class="row mt-4">
                                <div class="col">                                
                                    <a class="btn btn-light" href="/home">
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
                        
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
    </div>
</div>    
@endsection