<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Roles;
use App\Models\RolesUser;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesUserController extends Controller {
    const ROUTE = 'http://127.0.0.1:8000/';
    const ADMIN = 'admin';


    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable|RedirectResponse
     */
    public function create():Renderable|RedirectResponse {
        if(trim(strtolower(Auth::user()->name)) !== self::ADMIN)
            return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");

        return view('roles.assignOrEdit')
            ->with('id', $id ?? '')
            ->with('roles', [])
            ->with('content', [(new User())->select()->whereNotIn('name', ['admin'])->get(), Roles::all()])
            ->with('names', ['users', 'roles'])
            ->with('exists_all_records', (count(User::all()) > 0 && count(Roles::all()) > 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse {
        if(trim(strtolower(Auth::user()->name)) !== self::ADMIN)
            return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");

        (new RolesUser())->create([
            'user_id' => $request->users ?? '',
            'role_id' => $request->roles ?? ''
        ]);
        return $this->redirectToHome("success", "Se agregaro correctamente el roles");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return Renderable|RedirectResponse
     */
    public function edit($id):Renderable|RedirectResponse {
        if(trim(strtolower(Auth::user()->name)) !== self::ADMIN)
            return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");

        return view('roles.assignOrEdit')
            ->with('id', $id)
            ->with('roles', [
                (new RolesUser())->find($id)->user_id,
                (new RolesUser())->find($id)->role_id
            ])
            ->with('content', [(new User())->select()->whereNotIn('name', ['admin'])->get(), Roles::all()])
            ->with('names', ['users', 'roles'])
            ->with('exists_all_records', (count(User::all()) > 0 && count(Roles::all()) > 0));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request):RedirectResponse {
        if(trim(strtolower(Auth::user()->name)) !== self::ADMIN)
            return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");

        (new RolesUser())->where('id', '=', $request->id ?? '')->update([
            'user_id' => $request->users ?? '',
            'role_id' => $request->roles ?? ''
        ]);
        return $this->redirectToHome("success", "Se actualizo correctamente el roles");
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id):RedirectResponse {
        if(trim(strtolower(Auth::user()->name)) !== self::ADMIN)
            return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");

        (new RolesUser())->where('id', $id)->delete();
        return $this->redirectToHome("success", "Se elimino correctamente el roles");
    }

    private function redirectToHome($type, $message): RedirectResponse {
        return redirect()->away(self::ROUTE)->with($type, $message)
            ->with('names', ['Profesores', 'Aulas', 'Clases'])
            ->with('counts', [count(Teacher::all()), count(ClassRoom::all()), count(Classes::all())])
            ->with('available', (count(Teacher::all()) > 0 && count(ClassRoom::all()) > 0 && count(Classes::all()) > 0));
    }
}
