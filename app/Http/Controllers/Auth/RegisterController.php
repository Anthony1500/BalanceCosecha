<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Registro;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    protected $registro;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->registro = new Registro;
    }


    public function register(Request $request) {
    try {
        $regidentificacion = $request->input('regidentificacion');
        $regispassword = $request->input('regispassword');
        $regisagainpassword = $request->input('regisagainpassword');
        if ($regispassword !== $regisagainpassword) {
            return response()->json(['error' => 'Las contraseñas no coinciden'], 400);
        }

        // Verifica si la 'identificación' ya existe
        $existingRegistro = Registro::where('identificacion', $regidentificacion)->first();
        if ($existingRegistro) {
            return response()->json(['error' => 'El número de cédula proporcionado ya está asociado con una cuenta existente.'], 400);
        }
        // Inicia una transacción
        DB::beginTransaction();
        $this->registro->identificacion = $regidentificacion;
        $this->registro->password = Hash::make($regispassword);
        $this->registro->save();
        $identificacion =  $this->registro->identificacion;
        DB::commit();
        $request->session()->put('identificacion', $identificacion);
        // Devuelve una respuesta JSON con el mensaje
        return response()->json(['message' => 'Consulta exitosa']);
    } catch (\Exception $e) {
        // Si ocurre un error, deshace la transacción
        DB::rollBack();
        return response()->json(['error' => 'Ha ocurrido un error interno en el servidor.'], 500);
    }
}
public function registerall(Request $request) {

    try {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'usuario' => 'required|max:255|unique:registros',
            'email' => 'required|email|max:255|unique:registros',
            'pais' => 'required|max:255',
            'provincia' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'direccion_domicilio' => 'required|max:255',
            'telefono' => 'required|max:255',
            'cargo' => 'required|max:255',
        ]);

        $identificacion = $request->session()->get('identificacion');
        $registro = Registro::where('identificacion', $identificacion)->first();

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }
        DB::beginTransaction();
        $registro->update($validatedData);
        DB::commit();
        return response()->json(['success' => 'Registro actualizado con éxito.'], 200);
    } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        $errorMessage = $e->getMessage();
        return response()->json(['error' => 'Error en la base de datos al completar el registro: ' . $errorMessage], 400);
    } catch (\Exception $e) {
        DB::rollBack();
        $errorMessage = $e->getMessage();
        return response()->json(['error' =>  'Datos ingresados ya existentes en la base'], 409);
    }
}

















}
