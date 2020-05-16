@extends('layouts.app')

@section('title', 'Información')

@section('content')

    <div class="pt-4" style="padding-left:20%;">
        <div class="card text-center ml-4" style="width: 40rem;">
            {{-- @if (count($official->getMedia()) > 0)
                <img src="{{ $official->getMedia()[0]->getUrl() }}" class="card-img-top" alt="">
            @else
                <img src="/storage/default-user.png" alt="">
            @endif --}}
            <div class="card-header alert alert-dark">
                <h5>Información detallada de la PQRS</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Radicado #: {{ $pqr->id }}</li>
                    <li class="list-group-item">Descripción: {{ $pqr->description }}</li>
                    @if ($pqr->state == 'pending')
                        <li class="list-group-item">Estado: <span style="color: red;">Pendiente</span></li>
                    @endif
                    @if ($pqr->state == 'completed')
                        <li class="list-group-item">Estado: <span style="color: green;">Completado</span></li>
                    @endif
                    @if ($pqr->state == 'read')
                        <li class="list-group-item">Estado: <span style="color: blue;">Leído</span></li>
                    @endif
                    {{-- Rechazado --}}
                    @if ($pqr->state == 'rejected')
                        <li class="list-group-item">Estado: <span style="color: #ED10C8;;">Rechazado</span></li>
                    @endif

                    <li class="list-group-item">Dependencia: {{ $pqr->dependence->name }}</li>
                    <li class="list-group-item">Funcionario: {{ $pqr->getOfficial()['names'] }}</li>
                    
                    <li class="list-group-item">Número de páginas: {{ $pqr->number_of_pages }}</li>
                    <li class="list-group-item">Fecha de creación: {{ $pqr->created_at }}</li>
                    <li class="list-group-item">Fecha máxima respuesta: {{ $pqr->maximun_date }}</li>
                    @if (!Auth::user()->isAdmin())  
                    <li class="list-group-item"><a href="{{ route('giveanswer', ['pqr' => $pqr->id]) }}"><button type="button" class="btn btn-primary">Responder</button></a></li>
                    @endif
                    <ul class="list-group list-group-flush">
                        <h3>Documentos de la PQRS:</h3>
                        @foreach ($pqr->getMedia() as $doc)
                            <ol class="list-group-item"><a href="{{ $doc->getFullUrl() }}">{{ $doc->name }}</a></ol>
                        @endforeach                        
                    </ul>
                    {{-- Listado de respuestas que el usuario a dado --}}
                    @if (count($pqr->answers) > 0) 
                    <div class="dropdown-divider"></div>
                    <ul class="list-group list-group-flush">
                        <h3>Respuestas de la PQRS:</h3>
                        @foreach ($pqr->answers as $answer)
                            <ol class="list-group-item">{{ $answer->description }}</ol>
                            @foreach ($answer->getMedia() as $doc)
                                <ol class="list-group-item"><a href="{{ $doc->getFullUrl() }}">{{ $doc->name }}</a></ol>
                            @endforeach
                            @if (Auth::user()->isAdmin())  
                                <li class="list-group-item"><a href="{{ route('validatepqrs', ['pqr' => $pqr->id, 'yes' => true]) }}"><button type="button" class="btn btn-primary">Aprobar</button></a></li>
                                <li class="list-group-item"><a href="{{ route('validatepqrs', ['pqr' => $pqr->id, 'yes' => false]) }}"><button type="button" class="btn btn-danger">Rechazar</button></a></li>
                            @endif  
                            <div class="dropdown-divider"></div>
                        @endforeach                        
                    </ul>
                    @endif

                </ul>
            </div>            
        </div>

        {{-- Boton que permite dar respuesta a la pqrs por parte del funcionario --}}


    </div>

@endsection