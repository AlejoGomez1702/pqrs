{{-- Estilos para el formulario create official --}}
@push('styles')
    <link href="{{ asset('css/models/create-styles.css') }}" rel="stylesheet" >    
@endpush

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="text-center">Agregar Nuevo Funcionario</h3>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    <form action="" >
                        <!-- Foto -->
                        {{-- <div class="row">
                            <div class="col-md-5 mx-auto">
                                <div class="card shadow border" >
                                    <div class="card-header p-0" style="max-height: 13rem !important;">
                                        <img [hidden]="edit1" [src]="photoSelected  || '/assets/img/no-image-icon.png'"  alt="" class="card-img-top" style="max-height: 13rem !important;">

                                        <img [hidden]="!edit1" [src]="client.photo?.route ? url : '/assets/img/no-image-icon.png'"  alt="" class="card-img-top" style="max-height: 13rem !important;">
                                    </div>
                                    <div class="card-footer bg-info">
                                        <div class="form-group">
                                            <input type="file" name="uploadfile" id="imgClient" (change)="ponerFoto($event)" accept="image/*" style="display:none;"/>
                                            <div class="upload-image mr-auto">
                                                <label for="imgClient"><i class="fa fa-upload"></i>Subir Foto...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Cédula de ciudadania -->
                        <div class="form-group mb-0">
                            <div class="wrap-input100">
                                <input type="text" name="dni" required class="input100">
                                <span class="focus-input100" data-placeholder="Cédula de ciudadania"></span>
                            </div>
                        </div>
                        {{-- <div class="alert alert-danger" [hidden]="!error.dni">
                            {{ error.dni }}
                        </div> --}}
                        <br>
                        <!-- Nombres -->
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" name="name"  required class="input100">
                                <span class="focus-input100" data-placeholder="Nombres"></span>
                            </div>
                        </div>
                        {{-- <div class="alert alert-danger" [hidden]="!error.name">
                            {{ error.name }}
                        </div> --}}
                        <br>
                        <!-- Apellidos -->
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="text" name="lastname"  required class="input100">
                                <span class="focus-input100" data-placeholder="Apellidos"></span>
                            </div>
                        </div>
                        {{-- <div class="alert alert-danger" [hidden]="!error.lastname">
                            {{ error.lastname }}
                        </div> --}}
                        <br>

                        {{-- Correo electrónico --}}
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="email" name="email" required class="input100">
                                <span class="focus-input100" data-placeholder="Correo Electrónico"></span>
                            </div>
                        </div>

                        {{-- Contraseña --}}
                        <div class="form-group">
                            <div class="wrap-input100">
                                <input type="password" name="password" required class="input100">
                                <span class="focus-input100" data-placeholder="Contraseña"></span>
                            </div>
                        </div>

                        {{-- Repetir contraseña --}}
                        <div class="form-group">
                            <div class="wrap-input100">
                                <i class="far fa-eye-slash"></i>
                                <input type="password" name="password2" required class="input100">                                
                                <span class="focus-input100" data-placeholder="Confirmar Contraseña"></span>                                
                            </div>
                        </div>

                                            
                        <!-- Botones del formulario -->
                        <div class="row mt-4">
                            <div class="col">
                                <a class="btn btn-primary" >
                                    <i class="fa fa-chevron-left mr-md-3" aria-hidden="true"></i> 
                                    ATRAS
                                </a>
                            </div>
                            <div class="col" >
                                <button class="btn btn-success float-right" type="submit">
                                        AGREGAR                                    
                                    <i class="fa fa-plus ml-md-3" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>    
@endsection
