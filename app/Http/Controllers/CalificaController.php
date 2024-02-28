<?php

namespace App\Http\Controllers;

use App\Models\AreaCriterio;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Criterio;
use App\Models\Periodo;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = Empleado::all();
        $periodo = Periodo::all();
        $areas = Area::all();
        $criterios = Criterio::all();

        return view('empleados.edit2', compact('empleados', 'periodos', 'areas','criterios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id_empleado)
    {

        $datos = $request->all();
        $insertar = [];
        for($i = 0; $i<count($datos['criterio']);$i++){
            $nuevo = [
                'id_empleado' => $id_empleado,
                'id_periodo' => $datos['periodo'],
                'id_area' => $datos['area'][$i],
                'id_criterio' => $datos['criterio'][$i],
                'calificacion' => $datos['calificacion'][$i]
            ];
            array_push($insertar,$nuevo);
        }
        Calificacion::insert($insertar);
        return redirect()->route('empleados.index')
        ->with('success', 'Calificación guardada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {   
        DB::statement('SET sql_mode=""');
        $periodos = Periodo::join('criterios_califica_empleados','criterios_califica_empleados.id_periodo','periodos.id_periodo')->where('id_empleado',$empleado->id_empleado)->groupBy('periodos.id_periodo')->get();
        return view('empleados.info',compact('empleado','periodos'));
    }
    public function show2(Request $request, $id_empleado){
        $datos = $request->all();
        DB::statement('SET sql_mode=""');
        $actual = $datos['periodo'];
        $areas = Calificacion::join('areas','areas.id_area','criterios_califica_empleados.id_area')->where('id_periodo',$actual)->where('id_empleado',$id_empleado)->groupBy('areas.id_area')->get();
        $calificacionesPorArea = [];
        foreach($areas as $area){
            $criterios = Calificacion::join('criterios','criterios.id_criterio','criterios_califica_empleados.id_criterio')->where('id_area',$area->id_area)->where('id_periodo',$actual)->where('id_empleado',$id_empleado)->get();
            $nuevo = [
                'area'=>$area,
                'criterios'=>$criterios
            ];
            array_push($calificacionesPorArea,$nuevo);
        }
        $empleado = Empleado::find($id_empleado);
        $periodos = Periodo::join('criterios_califica_empleados','criterios_califica_empleados.id_periodo','periodos.id_periodo')->where('id_empleado',$empleado->id_empleado)->groupBy('periodos.id_periodo')->get();
        return view('empleados.info',compact('empleado','periodos','calificacionesPorArea','actual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit2($id_empleado)
    {
        $empleado = Empleado::find($id_empleado);
        $periodos = Periodo::all();
        $areas = Area::all();
        //$criterios = Criterio::all();
        return view('empleados.edit2', compact('empleado', 'periodos', 'areas'));
    }
    public function califica(Request $request, $id_empleado){
        $datos = $request->all();
        
        $empleado = Empleado::find($id_empleado);
        $periodo = Periodo::find($datos['id_periodo']);
        $areas = $datos['id_area'];
        $existen = Area::whereIn('id_area',$areas)->get();
        if(count($areas) != count($existen)){
            return back();
        }
            

        $criteriosPorArea = [];
        foreach($areas as $a){
            $criterios = AreaCriterio::join('criterios','criterios.id_criterio','area_asigna_criterios.id_criterio')->where('id_area',$a)->get();
            $area = Area::find($a);
            $criterio = [
                'area'=> $area,
                'criterios'=>$criterios
            ];
            array_push($criteriosPorArea,$criterio);
        }
        return view('empleados.califica',compact('criteriosPorArea','empleado','periodo'));
    }
    // public function califica($id_empleado,$id_periodo,$id_area)
    // {
    //     $empleado = Empleado::find($id_empleado);
    //     $periodo = Periodo::find($id_periodo);
    //     $area = Area::find($id_area);
    //     $areasConCriterios = $area->criterios()->with('criterios')->get();

    //     return view('empleados.califica', compact('empleado', 'periodo', 'areasConCriterios'));
    // }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        
    }
  
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_empleado)
    {
        $id_empleado->delete();
        return back()->with('danger','Proyecto eliminado correctamente.');
    }
}
