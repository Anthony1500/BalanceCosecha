<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Registro;
use Dotenv\Exception\ValidationException;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_proyecto' => 'required',
            'ruc' => 'required|numeric',
            'socios' => 'required',
            'pais' => 'required',
            'provincia' => 'required',
            'ciudad' => 'required',
            'direccion_proyecto' => 'required',
            'area_terreno' => 'required|numeric',
            'numero_plantas_arandanos' => 'required|numeric',
            'numero_plantas_fresas' => 'required|numeric',
            'coordenadas' => 'required',
        ], [
            'nombre_proyecto.required' => 'El nombre del proyecto es obligatorio.',
            'ruc.required' => 'El RUC es obligatorio.',
            'ruc.numeric' => 'El RUC debe ser un número.',
            'socios.required' => 'Los socios son obligatorios.',
            'pais.required' => 'El país es obligatorio.',
            'provincia.required' => 'La provincia es obligatoria.',
            'ciudad.required' => 'La ciudad es obligatoria.',
            'direccion_proyecto.required' => 'La dirección del proyecto es obligatoria.',
            'area_terreno.required' => 'El área del terreno es obligatoria.',
            'area_terreno.numeric' => 'El área del terreno debe ser un número.',
            'numero_plantas_arandanos.required' => 'El número de plantas de arándanos es obligatorio.',
            'numero_plantas_arandanos.numeric' => 'El número de plantas de arándanos debe ser un número.',
            'numero_plantas_fresas.required' => 'El número de plantas de fresas es obligatorio.',
            'numero_plantas_fresas.numeric' => 'El número de plantas de fresas debe ser un número.',
            'coordenadas.required' => 'Las coordenadas son obligatorias.',
        ]);


        try {
            $proyecto = Proyecto::where('ruc', $validatedData['ruc'])->first();
            if ($proyecto) {
                $changes = array_diff($validatedData, $proyecto->toArray());
                if (!empty($changes)) {
                    $proyecto->update($changes);
                    return response()->json(['success' => 'Registro actualizado con éxito.'], 201);
                } else {
                    return response()->json(['success' => 'No se realizaron cambios.'], 204);
                }
            } else {

               $proyecto = Proyecto::create($validatedData);
               $identificacion = $request->session()->get('identificacion');
               $registro = Registro::where('identificacion', $identificacion)->first();
               if ($registro) {
                   $registro->id_proyecto = $proyecto->id_proyecto;
                   $registro->save();
               }
               return response()->json(['success' => 'Registro creado con éxito.'], 200);
            }
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                $errorMessage = $e->getMessage();
                if (strpos($errorMessage, 'nombre_proyecto') !== false) {
                    return response()->json(['error' => 'El nombre del proyecto ya existe. Por favor, elige un nombre de proyecto diferente.'], 400);
                } else if (strpos($errorMessage, 'ruc') !== false) {
                    return response()->json(['error' => 'El RUC ya existe. Por favor, elige un RUC diferente.'], 400);
                }
            }
            return response()->json(['error' => 'Hubo un error al guardar el proyecto '], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function buscar(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'ruc' => 'required|numeric',
            ]);

            $ruc = $validatedData['ruc'];
            $proyecto = Proyecto::where('ruc', $ruc)->first();

            if ($proyecto) {
                return response()->json($proyecto);
            } else {
                return response()->json(['error' => 'No se encontró el proyecto con el RUC proporcionado.'], 404);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => 'El RUC proporcionado es inválido. Por favor, proporciona un RUC válido.'], 400);
        }
    }

    public function addtoproject(Request $request)
{
    try {
        $validatedData = $request->validate([
            'ruc' => 'required|numeric',
        ]);

        $ruc = $validatedData['ruc'];
        $proyecto = Proyecto::where('ruc', $ruc)->first();

        if ($proyecto) {
            $identificacion = session('identificacion');
            $registro = Registro::where('identificacion', $identificacion)->first();
            if ($registro) {
                $registro->id_proyecto = $proyecto->id_proyecto;
                $registro->save();
                return response()->json($proyecto);
            } else {
                return response()->json(['error' => 'Error al asociar con el proyecto.'], 404);
            }
        } else {
            return response()->json(['error' => 'No se encontró el proyecto con el RUC proporcionado.'], 404);
        }
    } catch (ValidationException $e) {
        return response()->json(['error' => 'El RUC proporcionado es inválido. Por favor, proporciona un RUC válido.'], 400);
    }
}
public function home(Request $request)
{

    $identificacion = session('identificacion');
    $registro = Registro::where('identificacion', $identificacion)->first();
    if ($registro) {
        session(['id_proyecto' => $registro->id_proyecto]);
        session(['id_registro' => $registro->id_registro]);
        $request->session()->forget('identificacion');
        $request->session()->forget('authToken');
        return response()->json(['success'], 200);
    } else {
        return response()->json(['error'], 404);

    }

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
