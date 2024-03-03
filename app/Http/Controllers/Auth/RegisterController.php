<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Registro;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $regidentificacion = $request->input('regidentificacion');
        $regispassword = $request->input('regispassword');
        $regisagainpassword = $request->input('regisagainpassword');

        // Verifica si las contraseñas coinciden
        if ($regispassword !== $regisagainpassword) {
            return response()->json(['error' => 'Las contraseñas no coinciden'], 400);
        }

        // Inicia una transacción
        DB::beginTransaction();

        $proyecto = new Proyecto;
        $proyecto->nombre_proyecto = 'Nuevo Proyecto';

        $proyecto->save();

        $registro = new Registro;
        $registro->identificacion = $regidentificacion;
        $registro->password = Hash::make($regispassword);
        $registro->proyecto()->associate($proyecto);
        $registro->save();
        $identificacion =  $registro->identificacion;
        DB::commit();


        return response()->json([
            'message' => 'Consulta exitosa',
            'idregistro' => $identificacion
        ], 200);

    } catch (\Exception $e) {
        // Si ocurre un error, deshace la transacción
        DB::rollBack();
        return response()->json(['error' => 'Ha ocurrido un error interno en el servidor.'], 500);
    }
}















}
