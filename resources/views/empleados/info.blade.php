@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                title="Inicio" href="{{route('empleados.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
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
            @php
                $act = 0; 
            @endphp
            <span class="h4">Calificaciones</span>
            <div class="col-md-3">
            @foreach($calificacionesPorArea as $area)
                @php
                    $ac = 0; 
                @endphp
                <span class="h5"><b>{{$area['area']->nombre_area}}</b></span>
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <thead>
              <tr>
                <th scope="col">Criterios</th>
                <th scope="col">Calificacion</th>
            </tr>
            </thead>
            <tbody>
                @foreach($area['criterios'] as $criterio)
                    <tr>
                    <td scope="row">{{$criterio->nombre_criterio}} </td>
                    <td scope="row">{{$criterio->calificacion}}</td>
                    </tr>
                    @php
                        $ac += $criterio->calificacion; 
                    @endphp
                @endforeach
        </tbody>
        </table>
        
                <span>Promedio de area : {{number_format($ac/count($area['criterios']),2)}}</span>
                @php
                    $act += $ac/count($area['criterios']);
                @endphp
            <br>
            @endforeach
            <span><b>Promedio General: {{number_format( $act /count($calificacionesPorArea),2) }}</b></span>
            @endif
            </div>
        </div>
        </div>
    </div>
@endsection
