<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Registro;
use App\Models\User;
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


        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'usuario' => 'required|max:255',
            'email' => 'required|email|max:255',
            'pais' => 'required|max:255',
            'provincia' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'direccion_domicilio' => 'required|max:255',
            'telefono' => 'required|max:255',
            'cargo' => 'required|max:255',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
        ]);



        $identificacion = $request->session()->get('identificacion');
        $registro = Registro::where('identificacion', $identificacion)->first();
        $user = User::where('usuario', $validatedData['usuario'])
        ->orWhere('email', $validatedData['email'])
        ->first();
        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }
        // Compara los datos enviados con los datos existentes
        $changes = array_diff($validatedData, $registro->toArray());
        if (!empty($changes)) {
            // Si hay cambios, realiza la actualización
            DB::beginTransaction();
            try {
                // Construye un nuevo array que sólo contenga los campos que han cambiado
                $dataToUpdate = array_intersect_key($validatedData, $changes);

                $registro->update($dataToUpdate);

                if ($user && $user->id_registro != $registro->id_registro) {
                    // Si el usuario ya existe y no es el mismo que se está actualizando, devuelve un error
                    return response()->json(['error' => 'El nombre de usuario o correo electrónico ya está en uso.'], 409);
                } else {
                    if (!$user) {
                        // Si el usuario no existe, crea una nueva instancia de User
                        $user = new User;
                    }
                    // Realiza la actualización
                    $user->usuario = $validatedData['usuario'];
                    $user->email = $validatedData['email'];
                    $user->password = $registro->password;
                    $user->id_registro = $registro->id_registro; // Añade el id del registro a la tabla de usuarios
                    $user->save();
                    DB::commit();
                    return response()->json(['success' => 'Registro realizado con éxito.'], 200);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollBack();
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    // Obtén el mensaje de error
                    $errorString = $e->errorInfo[2];
                    if (strpos($errorString, 'usuario')) {
                        return response()->json(['error' => 'El nombre de usuario ya está en uso.'], 409);
                    } else if (strpos($errorString, 'email')) {
                        return response()->json(['error' => 'El correo electrónico ya está en uso.'], 409);
                    }
                }
                // $errorMessage = $e->getMessage();
                return response()->json(['error' => 'Error en la base de datos al completar el registro.'], 400);
            } catch (\Exception $e) {
                DB::rollBack();
               // $errorMessage = $e->getMessage();
                return response()->json(['error' =>  'Datos ingresados ya existentes en la base'], 409);
            }
        } else {
            // Si no hay cambios, no realiza la actualización
            return response()->json(['success' ], 204);
        }

}

public function logout(Request $request) {
    Auth::guard('registro')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return response()->json(['message' => 'Sesión cerrada con éxito.'], 200);
}
















}
