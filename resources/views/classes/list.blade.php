@extends('layouts.main')
@section('content')
    @if (count($classes) > 0)
        <div class="container" >
            <table class="table table-dark table-striped shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th scope="col"><h3>Informacion</h3> </th>
                        <th scope="col"><h3>Acciones</h3> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>
                                <b>ID:</b> {{$class->code}}<br/>
                                <b>Nombre:</b> {{$class->name}}<br/>
                                <b>Credito:</b> {{$class->credit}}<br/>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="derian">
                                    <a href="/class/edit/{{$class->code}}" class="btn btn-warning">Editar</a>
                                    <form action="{{url("/class/delete/$class->code")}}" method="POST">
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
            <h3 class="text-white">No se han agregado clases</h3>
        </div>
    @endif
@endsection
