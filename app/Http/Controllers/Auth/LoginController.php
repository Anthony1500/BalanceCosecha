<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
{
    try {

        $logemail = $request->input('logemail');
        $logpassword = $request->input('logpassword');
        $credentials = [
            'email' => $logemail,
            'password' => $logpassword,
        ];
        if (Auth::guard('registro')->attempt($credentials)) {
            $user = Auth::guard('registro')->user();
            $request->session()->put('id_registro', $user->id_registro);
            $request->session()->put('id_proyecto', $user->id_proyecto);
            return response()->json(['message' => 'Inicio de sesión exitoso.'], 200);
        } else {
            return response()->json(['error' => 'Las credenciales proporcionadas no son válidas.'], 401);
        }
    } catch (ThrottleRequestsException $e) {
        return response()->json(['error' => 'Has superado el número máximo de intentos de inicio de sesión. Por favor, inténtalo de nuevo más tarde.'], 429);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ha ocurrido un error interno en el servidor.'], 500);
    }
}


 /* public function login(Request $request)
    {
        // Convert the request data to an associative array
        $requestData = $request->all();

        // Print the data as JSON
        echo json_encode($requestData);


    }
*/












}
