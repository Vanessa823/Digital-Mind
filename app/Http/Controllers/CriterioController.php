<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use Illuminate\Http\Request;

class CriterioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterios = Criterio::orderBy('id_criterio','ASC')->paginate(8);
        return view('criterios.index',['criterios'=> $criterios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criterios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_criterio'=> 'required|min:3|max:100|unique:criterios'
        ]);
        Criterio::create($request->all());
        
        return redirect()
                ->route('criterios.index')
                ->with('success','criterio registrada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Criterio $criterio)
    {
        return view('criterios.show',['criterio'=>$criterio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criterio $criterio)
    {
        return view('criterios.edit',['criterio' => $criterio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criterio $criterio)
    {
        $request->validate([
            'nombre_criterio'=> 'required|min:3|max:100|unique:criterios,nombre_criterio,'.$criterio->id_criterio.',id_criterio'
        ]);

        $criterio->fill($request->only([
            'nombre_criterio'
        ]));
        
        if($criterio->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar.');
        }
      
        $criterio->update($request->all());

        return redirect()->route('criterios.index')
        ->with('success1','Criterio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criterio $criterio)
    {
        $criterio->delete();
        return back()->with('danger','Criterio eliminado correctamente.');
    }
}
