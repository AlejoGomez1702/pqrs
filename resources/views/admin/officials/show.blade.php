@extends('layouts.app')

@section('title', 'Funcionario')

<style>
    .size-img
    {
        width: 200px;
        height: 200px;
    }
</style>

@section('content')

    <div class="pt-4" style="padding-left:20%;">
        <div class="card text-center ml-4" style="width: 40rem;">
            <div class="card-header alert alert-dark">
                <h5>Información detallada del funcionario</h5>
            </div>
            <div class="card-body">
                <img class="size-img" src="/storage/default-user.png" alt="">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Fecha de Creación: {{ $official->created_at }}</li>
                    <li class="list-group-item">Ultima Fecha Actualización: {{ $official->updated_at }}</li>
                    <li class="list-group-item">Cédula: {{ $official->identification_card }}</li>
                    <li class="list-group-item">Nombres: {{ $official->names }}</li>
                    <li class="list-group-item">Apellidos: {{ $official->surnames }}</li>
                    <li class="list-group-item">Correo Electrónico: {{ $official->email }}</li>
                    <li class="list-group-item">Dependencia: <span style="color: blue;">{{ $official->dependence->name }}</span></li>
                </ul>
            </div>            
        </div>
    </div>

@endsection