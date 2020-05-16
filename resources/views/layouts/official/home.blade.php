{{-- PQRS --}}

<style>
    .center-box
    {
        margin-top: 20px;
        margin-left: 40%;
    }

    .box
    {
        width: 150%;
    }
</style>

<div class="center-box">
    <div class="box">
        <a href="{{ route('requests.index') }}" style="color: #000000;">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">PQRS</span>
                    <span class="info-box-number">{{ $cant_pqrs }}</span>
                </div>
            </div>
        </a>            
    </div>
</div>
