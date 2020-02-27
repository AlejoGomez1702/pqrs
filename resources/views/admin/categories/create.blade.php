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
                    <h3 class="text-center">Agregar Nueva Categoría</h3>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    {{-- Formulario para el ingreso de los datos --}}
                    {!! Form::open(['url' => 'categories']) !!}            
                    @csrf
                        {{-- Nombre de la categoría --}}
                        <div class="input-container">
                            <i class="fas fa-signature icon"></i>
                            {!! Form::text('text',null, ['class' => 'input-field', 'placeholder' => 'Nombre', 
                                'name' => 'name']) !!}   
                        </div>
                        
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

            </div>
        </div>
    </div>
</div>    
@endsection
