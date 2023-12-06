<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::orderBy('id_tarea','ASC')->paginate(8);
        return view('tareas.index',['tareas'=> $tareas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion'=> 'required|min:3|max:100|unique:tareas'
        ]);
        Tarea::create($request->all());
        
        return redirect()
                ->route('tareas.index')
                ->with('success','Tarea registrada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show',['tarea'=>$tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit',['tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'descripcion'=> 'required|min:3|max:100|unique:tareas,descripcion,'.$tarea->id_tarea.',id_tarea'
        ]);

        $tarea->fill($request->only([
            'descripcion'
        ]));
        
        if($tarea->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar.');
        }
      
        $tarea->update($request->all());

        return redirect()->route('tareas.index')
        ->with('success1','Tarea Actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back()->with('danger','Tarea eliminada correctamente.');
    }
}
