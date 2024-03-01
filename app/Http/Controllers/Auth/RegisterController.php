<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/LoginForm';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        try {
            $regiusuario = $request->input('regiusuario');
            $regispassword = $request->input('regispassword');
            $regisagainpassword = $request->input('regisagainpassword');

            // Verifica si las contraseñas coinciden
            if ($regispassword !== $regisagainpassword) {
                return response()->json(['error' => 'Las contraseñas no coinciden'], 400);
            }

            // Crea una nueva instancia del modelo Registro
            $registro = new Registro;
            $registro->usuario = $regiusuario;
            $registro->password = Hash::make($regispassword);- // Asegúrate de encriptar la contraseña

            // Guarda el registro en la base de datos
            $registro->save();

            // Devuelve el id_registro del registro recién creado
            return response()->json(['message' => 'Registro exitoso', 'idregistro' => $registro->id_registro], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Ha ocurrido un error interno en el servidor.'], 500);
        }
    }













}
