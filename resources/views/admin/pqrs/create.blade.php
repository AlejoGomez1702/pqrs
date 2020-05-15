{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/edit-styles.css') }}" rel="stylesheet" >    
@endpush

@push('custom-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/applicants.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Nueva PQRS')

@section('content')
<div class="container-fluid">

    <div class="select-option">
            <div class="form-group">

                {{-- Particular --}}
                <div id="pa" class="particular text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Crear Nueva PQRS
                    </div>                   

                    <div class="card-body">

                        {{-- <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
                        @csrf --}}
                        {{-- </form> --}}
                        {!! Form::open(['url' => '/requests', 'files' => true]) !!}  
                        {{-- Número de páginas --}}
                        <div class="form-group">
                            <label>Número de páginas: *</label>
                            {!! Form::number('name',null, ['class' => 'form-control', 
                                    'placeholder' => 'Ingrese el número de páginas que conforman la petición...',
                                    'name' => 'number_of_pages']) !!}   
                        </div>
                        
                        {{-- Peticionario --}}
                        <div class="form-group">
                            <label>Peticionario: *</label>
                            {{-- Seleccionar el tipo de peticionario (privado, público o particular) --}}
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chec1" value="1" onclick="showOptions(1)">
                                <label class="form-check-label" for="chec1">Entidad Pública</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chec2" value="2" onclick="showOptions(2)">
                                <label class="form-check-label" for="chec2">Entidad Privada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chec3" value="3" onclick="showOptions(3)">
                                <label class="form-check-label" for="chec3">Persona Particular</label>
                            </div>
                        </div>
                        <div class="form-group" id="public">
                            <select class="form-control" name="select_public">
                              <option value="" selected>Seleccione la entidad pública</option>
                              @foreach ($publics as $public)
                                <option value="{{ $public->id }}">{{ $public->name }}</option>
                              @endforeach                              
                            </select>
                        </div>
                        <div class="form-group" id="private">
                            <select class="form-control" name="select_private">
                              <option value="" selected>Seleccione la entidad privada</option>
                              @foreach ($privates as $private)
                                <option value="{{ $private->id }}">{{ $private->name }}</option>
                              @endforeach                              
                            </select>
                        </div>
                        <div class="form-group"  id="particular">
                            <select class="form-control" name="select_particular">
                              <option value="" selected>Seleccione la persona particular</option>
                              @foreach ($particulars as $particular)
                                <option value="{{ $particular->id }}">{{ $particular->names . " " . $particular->surnames  }}</option>
                              @endforeach                              
                            </select>
                        </div>
                        
                        {{-- Descripción --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripción de la PQRS: *</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" 
                                        placeholder="Realice una descripción general de la PQRS..." name="description"></textarea>
                        </div>

                        {{-- Dependencia --}}
                        <div class="form-group">
                            <label>Dependencia encargada de la PQRS: *</label>
                            <select class="form-control" name="dependence">
                            <option value="" selected>Seleccione una dependencia</option>
                            @foreach ($dependences as $dependence)
                                <option value="{{ $dependence->id }}">{{ $dependence->name  }}</option>
                            @endforeach
                            </select>
                        </div>

                        {{-- Funcionario encargado del pqrs --}}
                        <div class="form-group">
                            <label>Funcionario destino de la PQRS: *</label>
                            <select class="form-control" name="official">
                            <option value="" selected>Seleccione un funcionario</option>
                            @foreach ($officials as $official)
                                <option value="{{ $official->id }}">{{ $official->names . " " .$official->surnames }}</option>
                            @endforeach
                            </select>
                        </div>

                        {{-- Fecha máxima de respuesta --}}
                        <div class="form-group">
                            <label>Fecha maxima de respuesta: *</label>
                            <input type="date" class="form-control" name="max_date" id="" lang="es">
                            {{-- {!! Form::number('cellphone',null, ['class' => 'form-control', 
                                    'placeholder' => 'Celular de la entidad (opcional)', 'name' => 'cellphone']) !!}    --}}
                        </div>

                        {{-- Archivos de la petición --}}
                        <label>Adjuntar archivo de la PQRS: </label>
                        <div class="custom-file">
                            
                            {{-- <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="files"> --}}
                            {!! Form::file('files', ['class' => 'custom-file-input', 'id' => 'customFileLang', 'lang' => 'es']) !!}
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo...</label>
                        </div>

                        <div class="btn-aln btn-group btn-down">                            
                            <button type="button" class="btn-size d-inline btn btn-danger"><a style="color:white;" href="/entities">Cancelar</a></button>
                            <button type="submit" class="btn-size d-inline btn btn-success">Aceptar</button>
                        </div>

                        {{-- </form> --}}
                        {!! Form::close() !!}
                    </div>
                        
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
    </div>
</div>    
@endsection
