<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TeacherController extends Controller {
    const ROUTE = 'http://127.0.0.1:8000/';

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable {
        return view('teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable {
        return view('teachers.createOrEdit')->with('teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        (new Teacher())->create($request->all());
        return redirect()->away(self::ROUTE.'teacher/show')->with('message', 'Se agregado correctamente el profesor')->with('teachers', Teacher::all());
    }

    /**
     * Display the specified resource.
     *
     * @return Renderable
     */
    public function show(): Renderable {
        return view('teachers.list')->with('message')->with('teachers', Teacher::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function edit($id): RedirectResponse {
        return redirect()->away(self::ROUTE.'teacher/show')->with('message')->with('teacher', (new Teacher())->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        (new Teacher())->where('id', '=', $request->id ?? '')->update([
            'name' => $request->name ?? '',
            'lastName' => $request->lastName ?? '',
            'title' => $request->title ?? ''
        ]);
        return redirect()->away(self::ROUTE.'teacher/show')->with('message', 'Profesor actualizado correctamente')->with('teachers', Teacher::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse {
        (new Teacher())->find($id)->delete();
        return redirect()->away(self::ROUTE);
    }
}
