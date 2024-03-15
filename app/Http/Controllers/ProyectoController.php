<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Registro;

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
        // Validar los datos del formulario
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
        ]);

        try {
            // Buscar el proyecto existente
            $proyecto = Proyecto::where('ruc', $validatedData['ruc'])->first();

            if ($proyecto) {
                // Si el proyecto existe, comparar los nuevos datos con los existentes
                $changes = array_diff($validatedData, $proyecto->toArray());

                // Si hay cambios, actualizar solo los campos que han cambiado
                if (!empty($changes)) {
                    $proyecto->update($changes);
                    return response()->json(['success' => 'Registro actualizado con éxito.'], 201);
                } else {
                    // Si no hay cambios, no realiza la actualización
                    return response()->json(['success' => 'No se realizaron cambios.'], 204);
                }
            } else {
               // Si el proyecto no existe, crear uno nuevo
               $proyecto = Proyecto::create($validatedData);
               // Obtener la identificación de la sesión
               $identificacion = $request->session()->get('identificacion');
               // Buscar el registro correspondiente
               $registro = Registro::where('identificacion', $identificacion)->first();
               if ($registro) {
                   // Asociar el proyecto con el registro
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
        $ruc = $request->get('ruc');
        $proyecto = Proyecto::where('ruc', $ruc)->first();

        if ($proyecto) {
            return response()->json($proyecto);
        } else {
            return response()->json(['error' => 'No se encontró el proyecto con el RUC proporcionado.'], 404);
        }
    }

    public function addtoproject(Request $request)
{
    $ruc = $request->get('ruc');
    $proyecto = Proyecto::where('ruc', $ruc)->first();

    if ($proyecto) {
        // Obtiene la identificación de la sesión
        $identificacion = session('identificacion');

        // Busca el registro correspondiente
        $registro = Registro::where('identificacion', $identificacion)->first();

        if ($registro) {
            // Asocia el id_proyecto con el registro
            $registro->id_proyecto = $proyecto->id_proyecto;
            $registro->save();

            return response()->json($proyecto);
        } else {
            return response()->json(['error' => 'No se encontró el registro con la identificación proporcionada.'], 404);
        }
    } else {
        return response()->json(['error' => 'No se encontró el proyecto con el RUC proporcionado.'], 404);
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
