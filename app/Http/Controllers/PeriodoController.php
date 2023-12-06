<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = Periodo::orderBy('id_periodo','DESC')->paginate(8);
        return view('periodos.index',['periodos'=> $periodos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre_proyecto'=> 'required|min:3|max:100|unique:periodos'
        // ]);
        Periodo::create($request->all());
        
        return redirect()
                ->route('periodos.index')
                ->with('success','Periodo registrado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        return view('periodos.show',['periodo'=>$periodo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        return view('periodos.edit',['periodo' => $periodo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodo $periodo)
    {
        // $request->validate([
        //     'nombre_proyecto'=> 'required|min:3|max:100|unique:periodos,nombre_proyecto,'.$periodo->id_proyecto.',id_proyecto'
        // ]);

        $periodo->fill($request->only([
            'mes','estatus'
        ]));
        
        if($periodo->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar.');
        }
      
        $periodo->update($request->all());
        $periodo->estatus = $request->input('estatus');
        $periodo->save();

        return redirect()->route('periodos.index')
        ->with('success1','Periodo Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return back()->with('danger','Periodo eliminado correctamente.');
    }
}
