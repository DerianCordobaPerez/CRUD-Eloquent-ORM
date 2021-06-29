<?php


namespace App\Http\Controllers;


use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;

class IndexController extends Controller {

    public function index(): Renderable {
        return view('welcome')
            ->with('names', ['Profesores', 'Aulas', 'Clases'])
            ->with('counts', [count(Teacher::all()), count(ClassRoom::all()), count(Classes::all())])
            ->with('available', (count(Teacher::all()) > 0 && count(ClassRoom::all()) > 0 && count(Classes::all()) > 0));
    }

}
