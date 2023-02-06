@extends('layouts.app')

@section('template_title')
    Mascotum
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mascota') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mascota.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear mascota') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Responsable de la Mascota</th>
										<th>Identificacion de la mascota</th>
										<th>Nombre</th>
										<th>Tipo de mascota </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mascota as $mascotum)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mascotum->cliente->nombres }}</td>
											<td>{{ $mascotum->identificacion }}</td>
											<td>{{ $mascotum->nombre }}</td>
											<td>{{ $mascotum->tipomascotum->nombre }}</td>

                                            <td>
                                                <form action="{{ route('mascota.destroy',$mascotum->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mascota.show',$mascotum->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mascota.edit',$mascotum->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $mascota->links() !!}
            </div>
        </div>
    </div>
@endsection
