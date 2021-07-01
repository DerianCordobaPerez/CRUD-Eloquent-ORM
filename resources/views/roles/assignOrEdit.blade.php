@extends('layouts.main')
@section('content')
    <form action="{{url(count($roles) <= 0 ? '/role_user/assign' : "/role_user/edit")}}" method="POST" class="col-md-6 mx-auto">
        {{csrf_field()}}
        <input type="hidden" value="{{$id}}" name="id" />
        <div class="card shadow p-3 mb-5 rounded bg-dark">
            <div class="card-header">
                <h1 class="text-center text-white">Formulario Roles</h1>
            </div>

            <div class="card-body">
                @for($i = 0; $i < count($content); ++$i)
                    @if(count($content[$i]) > 0)
                        <div class="form-floating">
                            <select class="form-select border border-danger" name="{{$names[$i]}}" id="floatingSelect" aria-label="Floating label select example" required>
                                @if(count($roles) > 0)
                                    <option disabled value="{{$roles[$i]}}">{{$roles[$i]}} - actual</option>
                                @endif

                                @foreach($content[$i] as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->id}} - {{$item->name}}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{$names[$i]}}</label>
                        </div>
                    @else
                        <h5 class="text-white">No hay registros para este selector <strong>"{{$names[$i]}}"</strong></h5>
                    @endif
                    <hr/>
                @endfor

                @if($exists_all_records)
                    <div class="d-grid gap-2">
                        <button type="submit" name="send" class="btn btn-primary">Enviar</button>
                    </div>
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        No se puede guardar un registro sin tener todos los requisitos
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
