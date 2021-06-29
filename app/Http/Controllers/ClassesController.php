<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassesController extends Controller {
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
        return view('classes.createOrEdit')->with('class');
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
     * @return Renderable
     */
    public function edit($id):Renderable {
        return view('classes.createOrEdit')->with('class', (new Classes())->find($id));
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
        (new Classes())->where('code', $code)->delete();
        return redirect()->away(self::ROUTE.'class/show')->with('error', 'Clase eliminada correctamente')->with('classes', Classes::all());
    }
}
