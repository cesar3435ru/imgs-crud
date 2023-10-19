@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Detalle del Documento</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('documentos.index') }}"> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nombre del archivo:</strong>
                    {{ $documento->nombrearchivo }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Ruta de la IMG:</strong>
                    <a href="{{ Storage::url($documento->rutaimg) }}" target="_blank">{{ $documento->rutaimg }}</a>

                    <hr>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Imagen:</strong>
                    <img src="{{ Storage::url($documento->rutaimg) }}" width="100%" />
                </div>
            </div>
            
            <br>
        </div>
        <br>
    </div>
@endsection
