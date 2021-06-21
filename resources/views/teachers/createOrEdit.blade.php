@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <h1 align="center">Formulario Profesores</h1>
                <form action="{{ url(is_null($teacher) ? '/teacher/create' : "/teacher/edit") }}" method="POST" class="col-md-6" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control col-md-6" name="id" placeholder="ID" maxlength="10" value="{{$teacher->id ?? ''}}" {{!is_null($teacher) ? 'readonly' : ''}} required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$teacher->name ?? ''}}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control col-md-6" name="lastName" placeholder="Apellido" value="{{$teacher->lastName ?? ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Título del profesor</label>
                        <select id="title" name="title" class="custom-select" required>
                            <option selected value="{{!is_null($teacher) ? $teacher->title : 'LIC'}}">{{$teacher->title ?? 'LIC'}}</option>
                            <option value="ING">Ingeniero</option>
                            <option value="MSC">Máster</option>
                            <option value="DOC">Doctor</option>
                        </select>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
