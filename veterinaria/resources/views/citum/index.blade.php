@extends('layouts.app')

@section('template_title')
    Citum
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Citas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cita.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear cita') }}
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
                                        
										<th>Fecha</th>
										<th>Identificación de la Mascota</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cita as $citum)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $citum->fecha }}</td>
											<td>{{ $citum->mascotum->identificacion }}</td>

                                            <td>
                                                <form action="{{ route('cita.destroy',$citum->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cita.show',$citum->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cita.edit',$citum->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $cita->links() !!}
            </div>
        </div>
    </div>
@endsection
