<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Imparts;
use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImpartsController extends Controller {

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
        return view('imparts.createOrEdit')
            ->with('id', $id ?? '')
            ->with('impart', [])
            ->with('content', [Teacher::all(), ClassRoom::all(), Classes::all()])
            ->with('names', ['teacher', 'classroom', 'class'])
            ->with('exists_all_records', (count(Teacher::all()) > 0 && count(ClassRoom::all()) && count(Classes::all())));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse {
        (new Imparts())->create([
            'code_class' => $request->class ?? '',
            'teacher_id' => $request->teacher ?? '',
            'classroom_id' => $request->classroom ?? ''
        ]);
        return redirect()->away(self::ROUTE.'impart/show')->with('success', 'Se agregaron correctamente los datos')->with('imparts', Imparts::all());
    }

    /**
     * Display the specified resource.
     * @return Renderable
     */
    public function show():Renderable {
        return view('imparts.list')->with('imparts', Imparts::all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param  $id
     * @return Renderable
     */
    public function edit($id):Renderable {
        return view('imparts.createOrEdit')
            ->with('id', $id)
            ->with('impart', [
                (new Imparts())->find($id)->teacher_id,
                (new Imparts())->find($id)->classroom_id,
                (new Imparts())->find($id)->code_class,
            ])
            ->with('content', [Teacher::all(), ClassRoom::all(), Classes::all()])
            ->with('names', ['teacher', 'classroom', 'class'])
            ->with('exists_all_records', (count(Teacher::all()) > 0 && count(ClassRoom::all()) > 0 && count(Classes::all()) > 0));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request):RedirectResponse {
        (new Imparts())->where('id', '=', $request->id ?? '')->update([
            'code_class' => $request->class ?? '',
            'teacher_id' => $request->teacher ?? '',
            'classroom_id' => $request->classroom ?? ''
        ]);
        return redirect()->away(self::ROUTE.'impart/show')->with('success', 'Datos actualizados correctamente')->with('imparts', Imparts::all());
    }

    /**
     * Remove the specified resource from storage.
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id):RedirectResponse {
        (new Imparts())->where('id', $id)->delete();
        return redirect()->away(self::ROUTE.'impart/show')->with('success', 'Profesor eliminado correctamente')->with('imparts', Imparts::all());
    }
}
