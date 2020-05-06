@push('styles')
    <link href="{{ asset('css/general.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('title', 'inicio')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8"> --}}
        {{-- PQRS --}}
        <div class="col-12 col-sm-6 col-md-3 mt-4">
            <a href="{{ route('officials.index') }}" style="color: #000000;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
        
                    <div class="info-box-content">
                        <span class="info-box-text">PQRS</span>
                        <span class="info-box-number">{{ $cant_officials }}</span>
                    </div>
                </div>
            </a>            
        </div>

        {{-- Funcionarios --}}
        <div class="col-12 col-sm-6 col-md-3 mt-4">
            <a href="{{ route('officials.index') }}" style="color: #000000;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
        
                    <div class="info-box-content">
                        <span class="info-box-text">Funcionarios</span>
                        <span class="info-box-number">{{ $cant_officials }}</span>
                    </div>
                </div>
            </a>            
        </div>

        {{-- Solicitantes --}}
        <div class="col-12 col-sm-6 col-md-3 mt-4">
            <a href="#" style="color: #000000;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>
        
                    <div class="info-box-content">
                        <span class="info-box-text">Solicitantes</span>
                        <span class="info-box-number">{{ $cant_applicants }}</span>
                    </div>
                </div>
            </a>            
        </div>

        {{-- Dependencias --}}
        <div class="col-12 col-sm-6 col-md-3 mt-4">
            <a href="{{ route('dependences.index') }}" style="color: #000000;">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-building"></i></span>
        
                    <div class="info-box-content">
                        <span class="info-box-text">Dependencias</span>
                        <span class="info-box-number">{{ $cant_dependences }}</span>
                    </div>
                </div>
            </a>            
        </div>

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
                <a href="">
                    <button type="button" class="btn btn-dark align-btn">Nueva PQRS</button>
                </a>

                <br><br>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        
    </div>
</div>

<script>

    var donutData = {
      labels: ['registered', 'assigned', 'pending', 'rejected', 'completed'],
      datasets: [
        {
          data: [700,500,400,600,300],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
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

