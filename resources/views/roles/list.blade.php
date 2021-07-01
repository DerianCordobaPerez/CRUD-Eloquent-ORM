@extends('layouts.main')
@section('content')
    @if (count($roleUser) > 0)
        <div class="container" >
            <table class="table table-dark table-striped shadow p-3 mb-5 bg-body rounded">
                <thead>
                <tr>
                    <th scope="col"><h3>Informacion</h3> </th>
                    <th scope="col"><h3>Acciones</h3> </th>
                </tr>
                </thead>

                <tbody>
                @foreach($roleUser as $role)
                    <tr>
                        @if((new \App\Models\User())->find($role->user_id)->name !== 'admin')
                            <td>
                                <b>Nombre usuario:</b> {{(new \App\Models\User())->find($role->user_id)->name}}<br>
                                <b>Nombre rol:</b> {{(new \App\Models\Role())->find($role->role_id)->name}}<br>
                            </td>

                            <td>
                                <div class="btn-group mx-auto" role="group" aria-label="derian">
                                    <form action="{{url("/role_user/delete/$role->id")}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" name="send">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        @endif
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
