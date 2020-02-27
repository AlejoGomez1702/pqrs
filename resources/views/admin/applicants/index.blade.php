{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('content')

<div class="row mx-md-5">        
    <div class="col-md-12">
        <h1 class="text-dark text-center my-3">Listado De Solicitantes</h1>
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
                @foreach ($applicants as $applicant)
                    <tr class="text-center" >
                        <td> {{ $applicant->identification_card }} </td>
                        <td> {{ $applicant->names }} </td>
                        <td> {{ $applicant->surnames }} </td>
                        <td> {{ $applicant->email }} </td>
                        <td>
                            <form action="{{ route('applicants.destroy', $applicant->id) }}" method="post">
                            <a class="btn" href="applicants/{{ $applicant->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn" href="applicants/{{ $applicant->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                {{-- Boton de eliminar --}}                            
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('Estas Seguro?')" class="btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>                            
                        </td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>        
</div>
    
@endsection