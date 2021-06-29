@extends('layouts.main')
@section('content')
    @if (count($imparts) > 0)
        <div class="container" >
            <table class="table table-dark table-striped shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th scope="col"><h3>Informacion</h3> </th>
                        <th scope="col"><h3>Acciones</h3> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imparts as $impart)
                        <tr>
                            <td>
                                <b>ID:</b> #{{$impart->id}}<br/>
                                <b>ID y Nombre Profesor:</b> {{$impart->teacher_id}} -  {{(new \App\Models\Teacher())->find($impart->teacher_id)->name}}<br>
                                <b>ID y Nombre del Aula:</b> {{$impart->classroom_id}} - {{(new \App\Models\ClassRoom())->find($impart->classroom_id)->name}}<br>
                                <b>ID y Nombre de la Clase:</b> {{$impart->code_class}} - {{(new \App\Models\Classes())->find($impart->code_class)->name}}
                            </td>
                            <td>
                                <br>
                                <div class="btn-group mx-auto" role="group" aria-label="derian">
                                    <a href="{{url("/impart/edit/$impart->id")}}" class="btn btn-warning">Editar</a>
                                    <form action="{{url("/impart/delete/$impart->id")}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" name="send">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-dark p-4 rounded shadow p-3 mb-5">
            <h3 class="text-white">No se han agregado datos a la relación</h3>
        </div>
    @endif
@endsection
