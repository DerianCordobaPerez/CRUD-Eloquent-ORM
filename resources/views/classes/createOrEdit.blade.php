@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <h1 align="center">Formulario Clase</h1>
                <form action="{{url(is_null($class) ? '/classroom/create' : "/classroom/edit")}}" method="POST" class="col-md-6" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control col-md-6" name="id" placeholder="ID" maxlength="10" value="{{$class->code ?? ''}}" {{!is_null($class) ? 'readonly' : ''}} required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$class->name ?? ''}}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control col-md-6" name="credit" placeholder="Credito" value="{{$class->credit ?? ''}}" required>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
