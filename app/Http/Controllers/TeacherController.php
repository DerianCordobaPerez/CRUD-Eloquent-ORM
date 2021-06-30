<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller {
    const ROUTE = 'http://127.0.0.1:8000/';

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable|RedirectResponse
     */
    public function create(): Renderable|RedirectResponse {
        if(Gate::allows('create'))
            return view('teachers.createOrEdit')->with('teacher');
        return $this->redirectToHome('error', 'No tienes permitido realizar esta accion');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        (new Teacher())->create($request->all());
        return redirect()->away(self::ROUTE.'teacher/show')->with('success', 'Se agregado correctamente el profesor')->with('teachers', Teacher::all());
    }

    /**
     * Display the specified resource.
     *
     * @return Renderable
     */
    public function show(): Renderable {
        return view('teachers.list')->with('teachers', Teacher::all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable|RedirectResponse
     */
    public function edit($id): Renderable|RedirectResponse {
        if(Auth::check()) {
            if(Auth::user()->can('edit', (new Teacher())->find($id)))
                return view('teachers.createOrEdit')->with('teacher', (new Teacher())->find($id));
        }
        return $this->redirectToHome('error', 'No estas autorizado para esta accion');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        (new Teacher())->where('id', '=', $request->id ?? '')->update([
            'name' => $request->name ?? '',
            'lastName' => $request->lastName ?? '',
            'title' => $request->title ?? ''
        ]);
        return redirect()->away(self::ROUTE.'teacher/show')->with('success', 'Profesor actualizado correctamente')->with('teachers', Teacher::all());
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse {
        (new Teacher())->where('id', $id)->delete();
        return redirect()->away(self::ROUTE.'teacher/show')->with('error', 'Profesor eliminado correctamente')->with('teachers', Teacher::all());
    }

    private function redirectToHome($type, $message): RedirectResponse {
        return redirect()->away(self::ROUTE)->with($type, $message)
            ->with('names', ['Profesores', 'Aulas', 'Clases'])
            ->with('counts', [count(Teacher::all()), count(ClassRoom::all()), count(Classes::all())])
            ->with('available', (count(Teacher::all()) > 0 && count(ClassRoom::all()) > 0 && count(Classes::all()) > 0));
    }
}
