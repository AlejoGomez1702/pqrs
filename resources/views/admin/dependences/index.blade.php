@extends('layouts.app')

@section('title', 'Dependencias')

{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet" >    
@endpush

@section('content')
<!-- Main content -->
<section class="content pt-4">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <!-- Tabla Full para gráficar los datos. -->
        <div class="card">
          <div class="card-header">
            @if ($search)
            <div class="alert alert-primary" role="alert">
              El Resultado de la busqueda '{{$search}}' es:
            </div>
            @endif
            <h3 class="card-title">Listado De Dependecias:</h3>
          </div>          
          <!-- /.card-header -->
          <div class="card-body">
            <table id="main-table" class="table table-bordered table-hover">
              <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Líder</th>
                    <th> Acciones </th>
                </tr>
              </thead>
              <tbody>
                    @if (count($dependences) != 0)
                    {{-- Recorriendo los funcionarios obtenidos --}}
                    @foreach ($dependences as $dependence)
                    <tr>
                        <td> {{ $dependence->name }} </td>
                        <td> {{ $dependence->email }} </td>
                        @if ($dependence->getLeader())
                        <td class="quit-color"> 
                          <a href="#" class="quit-color">{{ $dependence->getLeader()['names'] . ' ' . $dependence->getLeader()['surnames']}} </a>                   
                        </td>
                        @else
                          <td><a href="#">Asignar Líder</a></td>
                        @endif
                        <td class="center-icons">
                            <form action="{{ route('entities.destroy', $dependence->id) }}" method="post" class="size-field">
                                <a class="btn" href="entities/{{ $dependence->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="btn" href="entities/{{ $dependence->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                {{-- Boton de eliminar --}}                            
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('Estas Seguro?')" class="btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>                            
                        </td>
                    </tr>                    
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        No hay información para mostrar!
                    </div>
                         
                    @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


@endsection