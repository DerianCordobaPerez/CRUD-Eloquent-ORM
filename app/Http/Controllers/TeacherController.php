<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class TeacherController extends Controller
{
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
     * @return Redirector|Response
     */
    public function store(Request $request):Redirector|Response {
        (new Teacher())->create($request->all());
        return redirect('/teachers/show')->with('message', 'Se agregado correctamente el profesor')->with('teachers', Teacher::all());
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
     * @return Renderable
     */
    public function edit($id): Renderable {
        return view('teachers.createOrEdit')->with('message')->with('teacher', (new Teacher())->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed {
        (new Teacher())->where('id', '=', $request->id ?? '')->update([
            'name' => $request->name ?? '',
            'lastName' => $request->lastName ?? '',
            'title' => $request->title ?? ''
        ]);
        return redirect('/teacher/show')->with('message', 'Profesor actualizado correctamente')->with('teachers', Teacher::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Redirector
     */
    public function destroy($id):Redirector {
        (new Teacher())->find($id)->delete();
        return redirect('/');
    }
}
