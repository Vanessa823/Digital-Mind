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
        $periodos = Periodo::orderBy('id_periodo','ASC')->paginate(8);
        $existe = Periodo::where('mes','Marzo '.date('Y'))->first();
        return view('periodos.index',['periodos'=> $periodos,'existe'=>$existe]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('periodos.create');
       $existe = Periodo::where('mes','Enero, Febrero, Marzo '.date('Y'))->first();
        if($existe !=null){
            return redirect()->back()
                ->with('success','Ya hay periodos registrados para el año actual');
        }
        Periodo::where('estatus','actual')->update(['estatus'=>'evaluado']);
        $meses = [
            ['mes'=>'Enero, Febrero, Marzo ' .date('Y'),'estatus'=>'actual'],
            ['mes'=>'Abril, Mayo, Junio '.date('Y'),'estatus'=>'actual'],
            ['mes'=>'Julio, Agosto, Septiembre '.date('Y'),'estatus'=>'actual'],
            ['mes'=>'Octubre, Noviembre, Diciembre '.date('Y'),'estatus'=>'actual']
        ];
        Periodo::insert($meses);
        return redirect()
            ->route('periodos.index')
            ->with('success','periodos creados con exito');
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
