@push('styles')
    <link href="{{ asset('css/general.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('title', 'inicio')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8"> --}}
        @if (Auth::user()->isAdmin())
            @include('layouts.admin.home')
        @else
            @include('layouts.official.home')
        @endif


    </div>

    <div class="row">
        <!-- PIE CHART -->
        <div class="col">
            <div class="card card-danger">
                <div class="card-header center">
                  <h3 class="card-title">Estado General PQRS</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="pieChart"></canvas>
                </div>

                @if (Auth::user()->isAdmin())
                <a href="/requests/create">
                    <button type="button" class="btn btn-dark align-btn">Nueva PQRS</button>
                </a>
                @endif

                <br><br>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        
    </div>
</div>

<script>

    var donutData = {
      labels: ['Pendientes', 'Completados', 'En Espera', 'Rechazados'],
      datasets: [
        {
          data: [{{ $pendings }},{{ $completes }}, {{ $waits }}, {{ $rejectes }}],
          backgroundColor : ['#f56954', '#00a65a', '#DFEE26', '#ED10C8'],
        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
</script>

@endsection

