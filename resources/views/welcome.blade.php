@extends('layouts.main')

@section('content')
    <div class="mx-auto">
        <div class="bg-dark mx-auto rounded shadow">
            <h3 class="py-4 text-center text-white"><b>CRUD Eloquent ORM | Programación orientada a la web I</b></h3>
            <h4 class="text-center text-white">Practica realizada por Derian Ricardo Cordoba Perez</h4><br>
        </div>
        <hr/>

        <div class="bg-dark transparent-90 mx-auto rounded shadow p-2">
            @for($i = 0; $i < count($names); ++$i)
                <h5 class="text-white text-center"><b>Cantidad de {{$names[$i]}}:</b> {{$counts[$i]}}</h5>
            @endfor
        </div>
        <hr>

        <div class="bg-dark transparent-80 shadow mx-auto rounded p-2">
            <h3 class="text-center text-white">
                Crear un registro de imparte se encuentra: <b>{{!$available ? 'No' : ''}} Disponible</b>
            </h3>
            @if($available)
                <div class="d-grid gap-2">
                    <button class="btn btn-success"><a class="text-white nav-link" href="/impart/create">Crear un nuevo registro de imparte</a></button>
                </div>
            @endif
        </div>
    </div>
@endsection
