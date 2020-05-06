{{-- Estilos para los iconos del listado --}}
@push('styles')
    <link href="{{ asset('css/models/list-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content pt-4">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <!-- Tabla Full para gráficar los datos. -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado De Funcionarios:</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="main-table" class="table table-bordered table-hover">
              <thead class="thead-dark text-center">
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Dependencia</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                    {{-- Recorriendo los funcionarios obtenidos --}}
                    @foreach ($officials as $official)
                        <tr class="" >
                            <td> {{ $official->identification_card }} </td>
                            <td> {{ $official->names }} </td>
                            <td> {{ $official->surnames }} </td>
                            <td> {{ $official->email }} </td>
                            <td> {{ $official->dependence->name }} </td>
                            <td>
                                <form action="{{ route('officials.destroy', $official->id) }}" method="post" class="size-field">
                                    <a class="btn" href="officials/{{ $official->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn" href="officials/{{ $official->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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