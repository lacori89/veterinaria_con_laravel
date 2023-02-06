@extends('layouts.app')

@section('template_title')
    {{ $tipomascotum->name ?? 'Show Tipomascotum' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipomascotum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipomascota.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="mb-3">
                            <strong>Nombre:</strong>
                            {{ $tipomascotum->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
