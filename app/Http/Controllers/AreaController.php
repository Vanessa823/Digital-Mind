<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Criterio;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::orderBy('id_area','ASC')->paginate(8);
        return view('areas.index',['areas'=> $areas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $criterios = Criterio::pluck('nombre_criterio','id_criterio');

        return view('areas.create',['criterios'=> $criterios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_area'=> 'required|min:3|max:100|unique:areas'
        ]);
        $area = Area::create($request->all());
        
        $area->criterios()->sync($request->criterios);
        
        return redirect()
                ->route('areas.index')
                ->with('success','Area registrada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        $criterios = Criterio::pluck('nombre_criterio','id_criterio');
        return view('areas.show',['area'=>$area,'criterios'=> $criterios]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {   
        $criterios = Criterio::pluck('nombre_criterio','id_criterio');
        return view('areas.edit',['area' => $area,'criterios'=>$criterios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nombre_area'=> 'required|min:3|max:100|unique:areas,nombre_area,'.$area->id_area.',id_area'
        ]);

        // $area->fill($request->only([
        //     'nombre_area'
        // ]));
        
        // if($area->isClean()){
        //     return back()->with('warning','Debe realizar al menos un cambio para actualizar.');
        // }
      
        $area->update($request->all());

        $area->criterios()->sync($request->criterios);

        return redirect()->route('areas.index')
        ->with('success1','Area actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return back()->with('danger','Area eliminada correctamente.');
    }
}
