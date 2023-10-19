@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Lista de Documentos</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('documentos.create') }}">Nuevo Documento</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Nombre del archivo</th>
                        <th>Ruta de la IMG</th>
                        <th width="280px">Acciones</th>
                    </tr>
                    @foreach ($documentos as $documento)
                    <tr>
                        <td>{{ $documento ->id }}</td>
                        <td>{{ $documento->nombrearchivo }}</td>
                        <td><a href="{{ Storage::url($documento->rutaimg) }}" target="_blank">{{ $documento->rutaimg }}</a></td>
                        <td>
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('documentos.show', $documento->id) }}">Mostrar</a>
                                <a class="btn btn-primary" href="{{ route('documentos.edit', $documento->id) }}">Editar</a>
                                <a  class="btn btn-warning" href="{{ Storage::url($documento->rutaimg) }}" target="_blank">Ver IMG</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $documentos->links() !!}
            </div>
        </div>
    </div>
@endsection
