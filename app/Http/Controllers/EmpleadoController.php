<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Periodo;
use App\Models\Area;
use App\Models\Criterio;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $empleados = Empleado::orderBy('id_empleado','ASC')->paginate(8);
        return view('empleados.index',['empleados'=> $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_empleado'=> 'required|min:4|max:100|unique:empleados'
        ]);
        $empleado = Empleado::create($request->all());
        return redirect()
                ->route('empleados.index')
                ->with('success','Empleado registrado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show',['empleado'=>$empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit',['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre_empleado'=> 'required|min:3|max:100|unique:empleados,nombre_empleado,'.$empleado->id_empleado.',id_empleado'
        ]);

        $empleado->fill($request->only([
            'nombre_empleado','puesto','email','telefono'
        ]));
        
        if($empleado->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar.');
        }
      
        $empleado->update($request->all());

        return redirect()->route('empleados.index')
        ->with('success1','Empleado Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return back()->with('danger','Empleado eliminado correctamente.');
    }
}
