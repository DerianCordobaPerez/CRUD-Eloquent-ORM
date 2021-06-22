@extends('layouts.main')
@section('content')

    @if(!is_null($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif

    @if (count($classes) > 0)
        <div class="container" >
            <table class="table table-dark">
                <tr>
                    <th scope="col"><h3>Informacion</h3> </th>
                    <th scope="col"><h3>Acciones</h3> </th>
                </tr>
                @foreach($classes as $class)
                    <tr>
                        <td>
                            <b>ID:</b> {{$class->code}}<br/>
                            <b>Nombre:</b> {{$class->name}}<br/>
                            <b>Credito:</b> {{$class->credit}}<br/>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="derian">
                                <a href="/class/delete/{{$class->code}}" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h3 class="text-muted">No se han agregado clases</h3>
    @endif
@endsection
