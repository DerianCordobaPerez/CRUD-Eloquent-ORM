@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <h1 align="center">Formulario Aulas</h1>
                <form action="{{ url(is_null($classroom) ? '/classroom/create' : "/classroom/edit") }}" method="POST" class="col-md-6 mx-auto">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="number" class="form-control col-md-6" name="id" placeholder="ID" maxlength="10" value="{{$classroom->id ?? ''}}" {{!is_null($classroom) ? 'readonly' : ''}} required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$classroom->name ?? ''}}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control col-md-6" name="location" placeholder="Ubicacion" value="{{$classroom->location ?? ''}}" required>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
