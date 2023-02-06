@extends('layouts.app')

@section('template_title')
    {{ $citum->name ?? 'Show Citum' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Citum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cita.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="mb-3">
                            <strong>Fecha:</strong>
                            {{ $citum->fecha }}
                        </div>
                        <div class="mb-3">
                            <strong>Identificación Mascota:</strong>
                            {{ $citum->mascota_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
