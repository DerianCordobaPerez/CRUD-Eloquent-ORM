<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return view('teachers.createOrEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response {
        (new Teacher())->create($request->all());
        return response("Teacher created");
    }

    /**
     * Display the specified resource.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function show(Teacher $teacher): Response {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function edit(Teacher $teacher): Response {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Teacher $teacher
     * @return Response
     */
    public function update(Request $request, Teacher $teacher): Response {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function destroy(Teacher $teacher): Response {
        $teacher->delete();
        return response("Teacher with name $teacher->name deleted");
    }
}
