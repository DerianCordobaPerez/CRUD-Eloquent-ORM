@extends('layouts.main')
@section('content')
    @if (count($teachers) > 0)
        <div class="container" >
            <table class="table table-dark table-striped shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th scope="col"><h3>Informacion</h3> </th>
                        <th scope="col"><h3>Acciones</h3> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>
                                <b>ID:</b> {{$teacher->id}}<br/>
                                <b>Nombre:</b> {{$teacher->name}}<br/>
                                <b>Apellido:</b> {{$teacher->lastName}}<br/>
                                <b>Título:</b> {{$teacher->title}}<br/>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="derian">
                                    <a href="/teacher/edit/{{$teacher->id}}" class="btn btn-warning">Editar</a>
                                    <form action="{{url("/teacher/delete/$teacher->id")}}" method="POST">
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
            <h3 class="text-white">No se han agregado profesores</h3>
        </div>
    @endif

@endsection
