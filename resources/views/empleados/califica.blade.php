@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('warning') }}
            </div>
            @endif
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('empleados.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{route('CalificaController.store',$empleado)}}" method="post" class="row g-3">
            @csrf
            @method('POST')
              <div class="col-md-6">
                <label class="form-label">Calificar empleado : {{ $empleado->nombre_empleado }}</label><br>
              </div>
                <div class="col-md-6">
                    <label class="form-label">Periodo: {{$periodo->mes}}</label>
                    <input type="hidden" name="periodo" value="{{$periodo->id_periodo}}" required>
                </div>
                <span class="h3">Areas</span>
                
                @foreach($criteriosPorArea as $area)
                    <span class="h5">{{$area['area']->nombre_area}}</span>
                    <br>
                    <div class="col-md-1">
                        @if(sizeof($area['criterios']) > 0)
                        @foreach($area['criterios'] as $criterio)
                            <div >
                            <label class="from-label">{{$criterio->nombre_criterio}}</label>
                            <input type="hidden" name="criterio[]" value="{{$criterio->id_criterio}}">
                            <input type="hidden" name="area[]" value="{{$area['area']->id_area}}"required>
                            <input type="number" name="calificacion[]" class="form-control" required>
                            </div>
                        @endforeach
                        @error('tareas')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                         @else
                    <div class="alert alert-secondary">No se encontraron criterios para calificar</div>
                    @error('tareas')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                @endif
                    </div>
                @endforeach
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar calificacion</button>
              </div>
            </form>
            
        </div>
    </div>
</div>
@endsection