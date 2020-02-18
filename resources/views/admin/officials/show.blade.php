@extends('layouts.app')

@section('content')

    <div class="pt-4" style="padding-left:20%;">
        <div class="card text-center ml-4" style="width: 40rem;">
            @if (count($official->getMedia()) > 0)
                <img src="{{ $official->getMedia()[0]->getUrl() }}" class="card-img-top" alt="">
            @else
                <img src="/storage/default-user.png" alt="">
            @endif
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cédula: {{ $official->identification_card }}</li>
                <li class="list-group-item">Nombres: {{ $official->names }}</li>
                <li class="list-group-item">Apellidos: {{ $official->surnames }}</li>
                <li class="list-group-item">Correo Electrónico: {{ $official->email }}</li>
            </ul>
        </div>
    </div>

@endsection