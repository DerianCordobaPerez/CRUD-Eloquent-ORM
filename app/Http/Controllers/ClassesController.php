<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClassesController extends Controller {
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
            return view('classes.createOrEdit')->with('class');
        return $this->redirectToHome('error', 'No tienes permitido realizar esta accion');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse {
        (new Classes())->create($request->all());
        return redirect()->away(self::ROUTE.'class/show')->with('success', 'Se agregado correctamente la clase')->with('class', Classes::all());
   }

    /**
     * Display the specified resource.
     * @return Renderable
     */
    public function show():Renderable {
        return view('classes.list')->with('classes', Classes::all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable|RedirectResponse
     */
    public function edit($id):Renderable|RedirectResponse {
        if(Auth::check() && Auth::user()->can('edit', (new Teacher())->find($id)))
            return view('classes.createOrEdit')->with('class', (new Classes())->find($id));
        return $this->redirectToHome('error', 'No estas autorizado para esta accion');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request):RedirectResponse {
        (new Classes())->where('code', '=', $request->code ?? '')->update([
           'name' => $request->name ?? '',
           'credit' => $request->credit ?? ''
        ]);
        return redirect()->away(self::ROUTE.'class/show')->with('success', 'Clase actualizada correctamente')->with('classes', Classes::all());
    }

    /**
     * Remove the specified resource from storage.
     * @param $code
     * @return RedirectResponse
     */
    public function destroy($code):RedirectResponse {
        if(Auth::check() && Auth::user()->name === self::ADMIN) {
            (new Classes())->where('code', $code)->delete();
            return redirect()->away(self::ROUTE.'class/show')->with('error', 'Clase eliminada correctamente')->with('classes', Classes::all());
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
