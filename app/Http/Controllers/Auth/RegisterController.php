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
            $validatedData = $request->validate([
                'regidentificacion' => 'required|numeric',
                'regispassword' => 'required|min:8',
                'regisagainpassword' => 'required|same:regispassword',
            ], [
                'regidentificacion.required' => 'La identificación es obligatoria.',
                'regidentificacion.numeric' => 'La identificación debe ser un número.',
                'regispassword.required' => 'La contraseña es obligatoria.',
                'regispassword.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'regisagainpassword.required' => 'Es necesario confirmar la contraseña.',
                'regisagainpassword.same' => 'Las contraseñas no coinciden.',
            ]);

            $regidentificacion = $validatedData['regidentificacion'];
            $regispassword = $validatedData['regispassword'];
            $existingRegistro = Registro::where('identificacion', $regidentificacion)->first();
            if ($existingRegistro) {
                return response()->json(['error' => 'El número de cédula proporcionado ya está asociado con una cuenta existente.'], 400);
            }
            DB::beginTransaction();
            $this->registro->identificacion = $regidentificacion;
            $this->registro->password = Hash::make($regispassword);
            $this->registro->save();
            $identificacion =  $this->registro->identificacion;
            DB::commit();
            $request->session()->put('identificacion', $identificacion);
            return response()->json(['message' => 'Consulta exitosa']);
        } catch (\Exception $e) {
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
        $changes = array_diff($validatedData, $registro->toArray());
        if (!empty($changes)) {
            DB::beginTransaction();
            try {
                $dataToUpdate = array_intersect_key($validatedData, $changes);
                $registro->update($dataToUpdate);
                if ($user && $user->id_registro != $registro->id_registro) {
                    return response()->json(['error' => 'El nombre de usuario o correo electrónico ya está en uso.'], 409);
                } else {
                    if (!$user) {
                        $user = new User;
                    }
                    $user->usuario = $validatedData['usuario'];
                    $user->email = $validatedData['email'];
                    $user->password = $registro->password;
                    $user->id_registro = $registro->id_registro;
                    $user->save();
                    DB::commit();
                    return response()->json(['success' => 'Registro realizado con éxito.'], 200);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollBack();
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    $errorString = $e->errorInfo[2];
                    if (strpos($errorString, 'usuario')) {
                        return response()->json(['error' => 'El nombre de usuario ya está en uso.'], 409);
                    } else if (strpos($errorString, 'email')) {
                        return response()->json(['error' => 'El correo electrónico ya está en uso.'], 409);
                    }
                }
                return response()->json(['error' => 'Error en la base de datos al completar el registro.'], 400);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['error' =>  'Datos ingresados ya existentes en la base'], 409);
            }
        } else {
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
