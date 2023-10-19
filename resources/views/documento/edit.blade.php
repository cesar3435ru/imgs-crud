@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Editar Documento</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('documentos.index') }}"> Regresar</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Hubo algunos problemas con los datos que ingresaste.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Nombre del archivo:</strong>
                        <input type="text" name="nombrearchivo" value="{{ $documento->nombrearchivo }}" class="form-control" placeholder="Ingrese nombre del archivo">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Ruta de la imagen:</strong>
                        <input type="file" name="rutaimg" accept="image/*" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
