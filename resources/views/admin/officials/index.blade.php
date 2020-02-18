{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('content')

<div class="row mx-md-5">        
    <div class="col-md-12">
        <h1 class="text-dark text-center my-3">Listado De Funcionarios</h1>
        <table class="table border">
            <thead class="thead-dark text-center">
                <th scope="col">Cédula</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo Electrónico</th>
                <th> Acciones </th>
            </thead>
            <tbody>

                {{-- Recorriendo los funcionarios obtenidos --}}
                @foreach ($officials as $official)
                    <tr class="text-center" >
                        <td> {{ $official->identification_card }} </td>
                        <td> {{ $official->names }} </td>
                        <td> {{ $official->surnames }} </td>
                        <td> {{ $official->email }} </td>
                        <td>
                            <a class="btn" href="officials/{{ $official->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <button type="submit" class="btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>        
</div>
    
@endsection