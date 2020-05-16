{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/edit-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('title', 'Responder PQRS')

@section('content')
<div class="container-fluid">

    <div class="select-option">
            <div class="form-group">

                {{-- Particular --}}
                <div id="pa" class="particular text-form fm-color">
                    <div class="alert alert-dark txt-title" role="alert">
                        Responder PQRS Radicado# => {{ $pqr->id }}
                    </div>                   

                    <div class="card-body">

                        {{-- <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
                        @csrf --}}
                        {{-- </form> --}}
                        {!! Form::open(['url' => '/reply', 'files' => true]) !!}  
                                                
                        {{-- Respuesta --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Respuesta de la PQRS: *</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" required
                                        placeholder="Realice una descripción general de la PQRS..." name="description"></textarea>
                        </div>

                        {{-- Archivos de la petición --}}
                        <label>Si necesita adjuntar archivo, hagalo a continuación: </label>
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
