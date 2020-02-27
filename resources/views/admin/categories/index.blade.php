@extends('layouts.app')

{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet" >    
@endpush

@section('content')
<div class="row mx-md-5">        
    <div class="col-md-12">
        <h1 class="text-dark text-center my-3">Listado De Categorías</h1>
        <table class="table border">
            <thead class="thead-dark text-center">
                <th scope="col">Nombre</th>
                <th> Acciones </th>
            </thead>
            <tbody>

                {{-- Recorriendo los funcionarios obtenidos --}}
                @foreach ($categories as $category)
                    <tr class="text-center" >
                        <td> {{ $category->name }} </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            <a class="btn" href="categories/{{ $category->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn" href="categories/{{ $category->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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