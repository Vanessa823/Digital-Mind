<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\ProyectoTarea;
use App\Models\Tarea;
use App\Models\Empleado;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::orderBy('id_proyecto','ASC')->paginate(8);

        foreach ($proyectos as $proyecto) {
            $numTareas = $proyecto->tareas->count();
            $numHechas = $proyecto->tareas()->wherePivot('estado', 'hecha')->count();
            
            if($numTareas>0){
            $porcentaje = intval($numHechas /$numTareas  * 100); 
            $proyecto->update(['avance' => $porcentaje]);
            // Agregar los resultados al proyecto
            $proyecto->numTareasHechas = $numHechas;
            $proyecto->porcentaje = $porcentaje;
            }else{
                $proyecto->update(['avance' => 0]);
            }
        }
        

        return view('proyectos.index',['proyectos'=> $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $tareas = Tarea::pluck('descripcion','id_tarea','estado');
        $empleados =Empleado ::pluck('nombre_empleado','id_empleado');


        return view('proyectos.create',['tareas'=> $tareas,'empleados'=> $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_proyecto'=> 'required|min:3|max:100|unique:proyectos',
            'fecha_inicio'=> 'required',
            'fecha_entrega'=> 'required',
            
        ]);

        $proyecto = Proyecto::create($request->all());
        $proyecto->tareas()->sync($request->tareas);
        $proyecto->empleados()->sync($request->empleados);
        
        return redirect()
                ->route('proyectos.index')
                ->with('success','Proyecto registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {   
        $tareas = Tarea::pluck('descripcion','id_tarea','estado');
        $empleados = Empleado::pluck('nombre_empleado','id_empleado');
      
        return view('proyectos.show',['proyecto'=>$proyecto,'tareas'=> $tareas, 'empleados'=> $empleados]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $tareas = Tarea::pluck('descripcion','id_tarea','estado');
        $empleados =Empleado ::pluck('nombre_empleado','id_empleado');
        $estados = $proyecto->tareas->pluck('pivot.estado','id_tarea');

        return view('proyectos.edit',['proyecto' => $proyecto, 'tareas'=> $tareas,'empleados'=> $empleados,'estados'=> $estados]);
    }
    public function edit2(Proyecto $proyecto)
    {
        
        $tareas = Tarea::all();
        $estados = $proyecto->tareas->pluck('pivot.estado','id_tarea');
        
        return view('proyectos.edit2',['proyecto' => $proyecto,'tareas'=> $tareas,'estados'=> $estados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre_proyecto'=> 'required|min:3|max:100|unique:proyectos,nombre_proyecto,'.$proyecto->id_proyecto.',id_proyecto',
            'fecha_inicio'=> 'required',
            'fecha_entrega'=> 'required',
        ]);

        
      
        $proyecto->update($request->all());

        $proyecto->tareas()->sync( $request->tareas);
        $proyecto->empleados()->sync($request->empleados);
        
        return redirect()->route('proyectos.index')
        ->with('success1','Proyecto Actualizado correctamente.');
    }
    public function updateEstado(Request $request, Proyecto $proyecto){
        $proyecto->update($request->all());
        

        $estados=$request->input('estados',[]);
        
        foreach ($estados as $id_tarea => $estado) {
            $proyecto->tareas()->updateExistingPivot($id_tarea, ['estado' => $estado]);
        }
        return redirect()->route('proyectos.index')
        ->with('success1','Tareas de proyecto actualizadas correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return back()->with('danger','Proyecto eliminado correctamente.');
    }
}
