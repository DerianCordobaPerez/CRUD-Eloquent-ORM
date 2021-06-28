@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body">
            <div class="container">
                <h1 class="text-center">Formulario Imparte</h1>
                @if(!$exists_all_records)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        No se puede guardar un registro sin tener todos los requisitos
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <br>
                <form action="{{url(is_null($impart) ? '/impart/create' : "/impart/edit")}}" method="POST" class="col-md-6 mx-auto" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @for($i = 0; $i < count($content); ++$i)
                        @if(count($content[$i]) > 0)
                            <label for="title"><strong>{{$names[$i]}}</strong></label>
                            <select id="title" name="{{$names[$i]}}" class="custom-select" required>
                                @foreach($content[$i] as $item)
                                    <option value="{{$item->id ?? $item->code}}">
                                        {{$item->id ?? $item->code}}{{" - $item->name"}}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            No hay registros para este select <strong>"{{$names[$i]}}"</strong>
                        @endif
                        <hr/>
                    @endfor
                    @if($exists_all_records)
                        <input type="submit" value="Enviar" name="send" class="btn btn-primary"/>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

