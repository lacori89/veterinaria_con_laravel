@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="mb-3">
                            <strong>Documento:</strong>
                            {{ $cliente->documento }}
                        </div>
                        <div class="mb-3">
                            <strong>Nombres:</strong>
                            {{ $cliente->nombres }}
                        </div>
                        <div class="mb-3">
                            <strong>Celular:</strong>
                            {{ $cliente->celular }}
                        </div>
                        <div class="mb-3">
                            <strong>Correo:</strong>
                            {{ $cliente->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
