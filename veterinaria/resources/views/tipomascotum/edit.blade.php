@extends('layouts.app')

@section('template_title')
    Update Tipomascotum
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Tipo mascota</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipomascota.update', $tipomascotum->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipomascotum.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
