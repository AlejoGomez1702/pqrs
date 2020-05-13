{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/adminlte/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('title', 'Particulares')

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
          <h3 class="card-title">Listado De Entidades {{ $type }}:</h3>
        </div>          
        <!-- /.card-header -->
        <div class="card-body">
          <table id="main-table" class="table table-bordered table-hover">
            <thead class="thead-dark text-center">
              <tr>
                  <th>Nombre</th>
                  <th>NIT</th>
                  <th>Celular</th>
                  <th>Correo Electrónico</th>                  
                  <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                  @if (count($entities) != 0)
                  {{-- Recorriendo los funcionarios obtenidos --}}
                  @foreach ($entities as $entity)
                  <tr>
                      <td> {{ $entity->name }} </td>
                      <td> {{ $entity->nit }} </td>
                      @if ($entity->cellphone)
                      <td> {{ $entity->cellphone }} </td>
                      @else
                        <td> --- </td>
                      @endif
                      @if ($entity->email)
                      <td> {{ $entity->email }} </td>
                      @else
                        <td> --- </td>
                      @endif
                      <td class="center-icons">
                          <form action="{{ route('entities.destroy', $entity->id) }}" method="post" class="size-field">
                              <a class="btn" href="entities/{{ $entity->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <a class="btn" href="entities/{{ $entity->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
