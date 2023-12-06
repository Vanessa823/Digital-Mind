@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <span class="h5 mb-5">Empleado: {{$empleado->nombre_empleado}}</span>
            <form action="{{route('calificacontroller.show',$empleado->id_empleado)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8 mb-2 row">
                        <label class="form-label col-md-5">Periodo</label>
                        <div class="col-md-6">
                            <select name="periodo" class="form-select" required>
                                <option value="" select>Seleccionar...</option>
                                @foreach($periodos as $periodo)
                                    <option value="{{$periodo->id_periodo}}" {{ isset($actual)?($periodo->id_periodo == $actual ? "selected" : "" ):"" }}>{{$periodo->mes}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Ver Calificacion</button>
                </div>
            </form>
            @if(isset($calificacionesPorArea))
                <span class="h4">Calificaciones</span>
                @foreach($calificacionesPorArea as $area)
                    <span class="h5">{{$area['area']->nombre_area}}</span>
                    @foreach($area['criterios'] as $criterio)
                        <span>{{$criterio->nombre_criterio}} : {{$criterio->calificacion}}</span>
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection
