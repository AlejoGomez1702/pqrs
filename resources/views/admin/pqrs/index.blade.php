{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet"> 
@endpush

@extends('layouts.app')

@section('title', 'Listado')

@section('content')

<!-- Main content -->
<section class="content pt-4">
  <div class="row">
    <div class="col-12">
      <!-- /.card -->
      <!-- Tabla Full para gráficar los datos. -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado De PQRS:</h3>
        </div>          
        <!-- /.card-header -->
        <div class="card-body">
          <table id="main-table" class="table table-bordered table-hover">
            <thead class="thead-dark text-center">
              @if (count($pqrs) != 0)
              <tr>
                  <th>Radicado</th>
                  <th>Estado</th>
                  {{-- <th>Descripción</th> --}}
                  <th>Folios</th>
                  <th>Dependencia</th>
                  <th>Funcionario</th>
                  <th>Fecha creación</th>
                  <th>Fecha respuesta</th>
                  <th>Acciones</th>
              </tr>
            </thead>
            <tbody>                  
                  {{-- Recorriendo los funcionarios obtenidos --}}
                  @foreach ($pqrs as $pqr)
                  <tr class="" >
                    <td> {{ $pqr->id }} </td>
                    @if ($pqr->state == 'pending')
                        <td style="color: red;"> Pendiente </td>
                    @endif
                    @if ($pqr->state == 'read')
                        <td style="color: yellow;"> Leído </td>
                    @endif

                    @if ($pqr->state == 'completed')
                        <td style="color: green;"> Completado </td>
                    @endif
                    
                    {{-- <td> {{ $pqr->description }} </td> --}}
                    <td> {{ $pqr->number_of_pages }} </td>
                    <td> {{ $pqr->dependence->name }} </td>
                    <td> {{ $pqr->getOfficial()['names'] . ' ' . $pqr->getOfficial()['surnames'] }} </td>
                    <td> {{ $pqr->created_at }} </td>
                    <td> {{ $pqr->maximun_date }} </td>
                      
                    <td class="center-icons">
                        <form action="{{ route('requests.destroy', $pqr->id) }}" method="post" class="size-field">
                            <a title="Ver PQRS" class="btn" href="requests/{{ $pqr->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            {{-- <a title="Modificar Solicitante" class="btn" href="requests/{{ $pqr->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                            {{-- Boton de eliminar --}}     
                            @if (Auth::user()->isAdmin())  
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button title="Eliminar PQRS" type="submit" onclick="return confirm('Estas Seguro?')" class="btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>                              
                            @endif                                                   
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
          @if (Auth::user()->isAdmin())  
          {{ $pqrs->links() }}
          @endif
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
