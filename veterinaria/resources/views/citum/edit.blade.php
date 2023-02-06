@extends('layouts.app')

@section('template_title')
    Update Citum
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar cita</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cita.update', $citum->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('citum.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
