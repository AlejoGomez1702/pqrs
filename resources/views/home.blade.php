@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8"> --}}
        {{-- Funcionarios --}}
        <div class="col-12 col-sm-6 col-md-3 mt-4">
            <a href="{{ route('officials.index') }}" style="color: #000000;">
                <div [routerLink]="['/dashboard/routes']" class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
        
                    <div class="info-box-content">
                        <span class="info-box-text">Funcionarios</span>
                        <span class="info-box-number">{{ $cant_officials }}</span>
                    </div>
                </div>
            </a>            
        </div>
    </div>
</div>
@endsection
