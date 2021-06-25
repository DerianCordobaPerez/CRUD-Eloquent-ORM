@extends('layouts.main')
@section('content')

    @if(!is_null($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif

    @if (count($classrooms) > 0)
        <div class="container" >
            <table class="table  table-dark">
                <tr>
                    <th scope="col"><h3>Informacion</h3> </th>
                    <th scope="col"><h3>Acciones</h3> </th>
                </tr>
                @foreach($classrooms as $classroom)
                    <tr>
                        <td>
                            <b>ID:</b> {{$classroom->id}}<br/>
                            <b>Nombre:</b> {{$classroom->name}}<br/>
                            <b>Ubicacion:</b> {{$classroom->location}}<br/>
                        </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="derian">
                                <a href="/classroom/edit/{{$classroom->id}}" class="btn btn-warning">Editar</a>
                                <form action="{{url("/classroom/delete/$classroom->id")}}" method="POST">
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
            No se han agregado aulas
        </h3>
    @endif
@endsection
