<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

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
        $request->validate([
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
            // Crear un nuevo proyecto con los datos del formulario
            $proyecto = new Proyecto;
            $proyecto->nombre_proyecto = $request->nombre_proyecto;
            $proyecto->ruc = $request->ruc;
            $proyecto->socios = $request->socios;
            $proyecto->pais = $request->pais;
            $proyecto->provincia = $request->provincia;
            $proyecto->ciudad = $request->ciudad;
            $proyecto->direccion_proyecto = $request->direccion_proyecto;
            $proyecto->area_terreno = $request->area_terreno;
            $proyecto->numero_plantas_arandanos = $request->numero_plantas_arandanos;
            $proyecto->numero_plantas_fresas = $request->numero_plantas_fresas;
            $proyecto->coordenadas = $request->coordenadas;
    
            // Guardar el proyecto en la base de datos
            $proyecto->save();
    
            // Redirigir al usuario a una página de éxito (cambia esto según tus necesidades)
            return response()->json(['success' => 'Registro exitoso.'], 200);
        } catch (\Exception $e) {
            // Manejar la excepción
            return response()->json(['error' => 'Hubo un error al guardar el proyecto: ' . $e->getMessage()], 500);
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
