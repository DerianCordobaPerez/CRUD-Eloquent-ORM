@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <form action="{{url(is_null($classroom) ? '/classroom/create' : "/classroom/edit")}}" method="POST"
                      class="col-md-6 mx-auto">
                    {{csrf_field()}}
                    <div class="card bg-dark rounded shadow p-3 mb-5">
                        <div class="card-header">
                            <h1 class="text-center text-white">Formulario Aulas</h1>
                        </div>

                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="number" class="form-control border border-2 border-warning"
                                               name="id" placeholder="ID" min="1" value="{{$classroom->id ?? ''}}"
                                               {{!is_null($classroom) ? 'readonly' : ''}} required>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" class="form-control border border-2 border-warning"
                                               name="name" placeholder="Nombre" maxlength="20" minlength="1"
                                               value="{{$classroom->name ?? ''}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-2">
                                <input type="text" class="form-control border border-2 border-warning" name="location"
                                       placeholder="Ubicacion" value="{{$classroom->location ?? ''}}" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-grid gap-2">
                                <button type="submit" name="send" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
