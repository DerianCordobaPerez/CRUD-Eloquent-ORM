@extends('layouts.main')
@section('content')
    @if (count($imparts) > 0)
        <div class="container" >
            <table class="table  table-dark">
                <tr>
                    <th scope="col"><h3>Informacion</h3> </th>
                    <th scope="col"><h3>Acciones</h3> </th>
                </tr>
                @foreach($imparts as $impart)
                    <tr>
                        <td>
                            <b>ID:</b> {{$impart->id}}<br/>
                            <b>ID Profesor:</b> {{$impart->teacher_id}}<br/>
                            <b>ID Aula:</b> {{$impart->classroom_id}}<br/>
                            <b>ID Clase:</b> {{$impart->code_class}}<br/>
                        </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="derian">
                                <a href="{{url("/impart/edit/$impart->id")}}" class="btn btn-warning">Editar</a>
                                <form action="{{url("/impart/delete/$impart->id")}}" method="POST">
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
            No se han agregado datos a la relacion
        </h3>
    @endif
@endsection
