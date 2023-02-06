@extends('layouts.app')

@section('template_title')
    {{ $mascotum->name ?? 'Show Mascotum' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mascotum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mascota.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="mb-3">
                            <strong>Responsable Id:</strong>
                            {{ $mascotum->responsable_id }}
                        </div>
                        <div class="mb-3">
                            <strong>Identificacion:</strong>
                            {{ $mascotum->identificacion }}
                        </div>
                        <div class="mb-3">
                            <strong>Nombre:</strong>
                            {{ $mascotum->nombre }}
                        </div>
                        <div class="mb-3">
                            <strong>Tipomascota Id:</strong>
                            {{ $mascotum->tipomascota_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
