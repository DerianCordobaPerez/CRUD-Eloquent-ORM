<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Role;
use App\Models\RoleUser;
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
     * @return Renderable|RedirectResponse
     */
    public function create():Renderable|RedirectResponse {
        if(Auth::check()) {
            if(trim(strtolower(Auth::user()->name)) === self::ADMIN)
                return view('roles.assignOrEdit')
                    ->with('id', $id ?? '')
                    ->with('roles', [])
                    ->with('content', [(new User())->select()->whereNotIn('name', ['admin'])->get(), Role::all()])
                    ->with('names', ['user', 'role'])
                    ->with('exists_all_records', (count((new User())->select()->whereNotIn('name', ['admin'])->get()) > 0 && count(Role::all()) > 0));
        }
        return $this->redirectToHome("error", "Solo el Administrador puede acceder a esta ruta");
    }

    public function show():Renderable|RedirectResponse {
        if(Auth::check()) {
            if(Auth::user()->name === self::ADMIN)
                return view('roles.list')->with('roleUser', RoleUser::all());
        }
        return $this->redirectToHome('error', 'Solo el Administrador puede realizar esta operacion');
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

        (new RoleUser())->create([
            'user_id' => $request->user ?? '',
            'role_id' => $request->role ?? ''
        ]);
        return $this->redirectToHome("success", "Se agrego correctamente el rol");
    }

    public function destroy($id):RedirectResponse {
        if(Auth::check()) {
            if(Auth::user()->name === self::ADMIN) {
                (new RoleUser())->where('id', $id)->delete();
                return redirect()->away(self::ROUTE.'role_user/show')->with('success', 'Rol eliminado correctamente')->with('roleUser', RoleUser::all());
            }
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
