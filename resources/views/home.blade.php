@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8"> --}}
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
            <a href="{{ route('applicants.index') }}" style="color: #000000;">
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
</div>
@endsection
