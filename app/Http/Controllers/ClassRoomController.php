<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassRoomController extends Controller {
    const ROUTE = 'http://127.0.0.1:8000/';
    const ADMIN = 'admin';

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index():Renderable {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable|RedirectResponse
     */
    public function create():Renderable|RedirectResponse {
        if(Gate::allows('create'))
            return view('classroom.createOrEdit')->with('classroom');
        return $this->redirectToHome('error', 'No tienes permitido realizar esta accion');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse {
        (new ClassRoom())->create($request->all());
        return redirect()->away(self::ROUTE.'classroom/show')->with('success', 'Se agregado correctamente el aula')->with('classroom', ClassRoom::all());
    }

    /**
     * Display the specified resource.
     * @return Renderable
     */
    public function show(): Renderable {
        return view('classroom.list')->with('classrooms', ClassRoom::all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable|RedirectResponse
     */
    public function edit($id):Renderable|RedirectResponse {
        if(Auth::check()) {
            if(Auth::user()->can('edit', (new Teacher())->find($id)))
                return view('classroom.createOrEdit')->with('classroom', (new ClassRoom())->find($id));
        }
        return $this->redirectToHome('error', 'No estas autorizado para esta accion');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request):RedirectResponse {
        (new ClassRoom())->where('id', '=', $request->id ?? '')->update([
            'name' => $request->name ?? '',
            'location' => $request->location ?? ''
        ]);
        return redirect()->away(self::ROUTE.'classroom/show')->with('success', 'Aula actualizada correctamente')->with('classrooms', ClassRoom::all());
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse {
        if(Auth::check() && Auth::user()->name === self::ADMIN) {
            (new ClassRoom())->where('id', $id)->delete();
            return redirect()->away(self::ROUTE.'classroom/show')->with('error', 'Aula eliminada correctamente')->with('classrooms', ClassRoom::all());
        }
        return $this->redirectToHome('error', 'Solo el Administrador puede realizar esta operacion');
    }

    private function redirectToHome($type, $message): RedirectResponse {
        return redirect()->away(self::ROUTE)->with($type, $message)
            ->with('names', ['Profesores', 'Aulas', 'Clases'])
            ->with('counts', [count(Teacher::all()), count(ClassRoom::all()), count(Classes::all())])
            ->with('available', (count(Teacher::all()) > 0 && count(ClassRoom::all()) > 0 && count(Classes::all()) > 0));
    }
}
