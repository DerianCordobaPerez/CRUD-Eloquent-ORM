@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <form action="{{url(is_null($teacher) ? '/teacher/create' : "/teacher/edit")}}" method="POST" class="col-md-6 mx-auto">
                    {{csrf_field()}}
                    <div class="card shadow p-3 mb-5 rounded bg-dark">
                        <div class="card-header">
                            <h1 class="text-center text-white">Formulario Profesores</h1>
                        </div>
                        <div class="card-body">

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" class="form-control border border-2 border-info" name="id" placeholder="ID" maxlength="10" value="{{$teacher->id ?? ''}}" {{!is_null($teacher) ? 'readonly' : ''}} required>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" class="form-control border border-2 border-info" name="name" placeholder="Nombre" maxlength="20" value="{{$teacher->name ?? ''}}" required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="text" class="form-control border border-2 border-info" name="lastName" placeholder="Apellido" maxlength="20" value="{{$teacher->lastName ?? ''}}" required>
                            </div>
                            <br/>
                            <div class="form-floating">
                                <select class="form-select border border-2 border-warning" name="title" id="floatingSelect" aria-label="Floating label select example" required>
                                    @if(!is_null($teacher))
                                        <option disabled value="{{$teacher->title}}">{{$teacher->title}} - actual</option>
                                    @endif
                                    <option value="LIC">Licenciado</option>
                                    <option value="ING">Ingeniero</option>
                                    <option value="MSC">Máster</option>
                                    <option value="DOC">Doctor</option>
                                </select>
                                <label for="floatingSelect">Titulo</label>
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
