@extends('layouts.main')
@section('content')

    @if(!is_null($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif

    @if (count($teachers) > 0)
        <div class="container" >
            <table class="table  table-dark">
                <tr>
                    <th scope="col"><h3>Informacion</h3> </th>
                    <th scope="col"><h3>Acciones</h3> </th>
                </tr>
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
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="send">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h3 class="text-muted">
            No se han agregado profesores
        </h3>
    @endif

@endsection
