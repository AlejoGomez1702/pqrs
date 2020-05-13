{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet"> 
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
          <h3 class="card-title">Listado De Peticionarios Particulares:</h3>
        </div>          
        <!-- /.card-header -->
        <div class="card-body">
          <table id="main-table" class="table table-bordered table-hover">
            <thead class="thead-dark text-center">
              @if (count($applicants) != 0)
              <tr>
                  <th>Cédula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Correo Electrónico</th>
                  <th>Celular</th>
                  <th>Acciones</th>
              </tr>
            </thead>
            <tbody>                  
                  {{-- Recorriendo los funcionarios obtenidos --}}
                  @foreach ($applicants as $applicant)
                  <tr class="" >
                      <td> {{ $applicant->identification_card }} </td>
                      <td> {{ $applicant->names }} </td>
                      <td> {{ $applicant->surnames }} </td>
                      @if ($applicant->email)
                      <td> {{ $applicant->email }} </td>
                      @else
                        <td> --- </td>
                      @endif
                      @if ($applicant->cellphone)
                      <td> {{ $applicant->cellphone }} </td>
                      @else
                        <td> --- </td>
                      @endif
                      <td class="center-icons">
                          <form action="{{ route('applicants.destroy', $applicant->id) }}" method="post" class="size-field">
                              {{-- <a class="btn" href="applicants/{{ $applicant->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                              <a title="Modificar Solicitante" class="btn" href="applicants/{{ $applicant->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                              {{-- Boton de eliminar --}}                            
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button title="Eliminar Solicitante" type="submit" onclick="return confirm('Estas Seguro?')" class="btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
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
          {{ $applicants->links() }}
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
