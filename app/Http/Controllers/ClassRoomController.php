<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassRoomController extends Controller {
    const ROUTE = 'http://127.0.0.1:8000/';

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index():Renderable {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create():Renderable {
        return view('classroom.createOrEdit')->with('classroom');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse {
        (new ClassRoom())->create($request->all());
        return redirect()->away(self::ROUTE.'classroom/show')->with('message', 'Se agregado correctamente el aula')->with('classroom', ClassRoom::all());
    }

    /**
     * Display the specified resource.
     * @return Renderable
     */
    public function show(): Renderable {
        return view('classroom.list')->with('message')->with('classrooms', ClassRoom::all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable
     */
    public function edit($id):Renderable {
        return view('classroom.createOrEdit')->with('message')->with('classroom', (new ClassRoom())->find($id));
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
        return redirect()->away(self::ROUTE.'classroom/show')->with('message', 'Aula actualizada correctamente')->with('classrooms', ClassRoom::all());
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse {
        (new ClassRoom())->where('id', $id)->delete();
        return redirect()->away(self::ROUTE.'classroom/show')->with('message', 'Aula eliminada correctamente')->with('classrooms', ClassRoom::all());
    }
}
