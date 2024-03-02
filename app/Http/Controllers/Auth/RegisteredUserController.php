<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    // vista de registro de creadores de eventos
    public function createCreador(): View
    {
        $empresas = Empresa::orderBy('nombre', 'asc')->get();

        return view('auth.register-creador', ['empresas' => $empresas]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $edad = null;
        $puesto = null;
        $empresa = null;

        if (isset($request->edad)) {
            $edad = $request->edad;
        }

        if (isset($request->puesto)) {
            $puesto = $request->puesto;
        }

        if (isset($request->empresa)) {
            $empresa = $request->empresa;
        }

        $user = new User();
        $user->rol = $request->rol;
        $user->name = $request->name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->apellidos = $request->apellidos;
        $user->edad = $edad;
        $user->direccion = $request->direccion;
        $user->ciudad = $request->ciudad;
        $user->telefono = $request->telefono;
        $user->puesto = $puesto;
        $user->empresa_id = $empresa;
        $user->password = Hash::make($request->password);
        $user->save();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
