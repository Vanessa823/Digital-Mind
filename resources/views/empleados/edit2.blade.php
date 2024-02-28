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
        <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre del Empleado :   {{$empleado->nombre_empleado}}</label>
            </div>
        <div class="col-md-12">
            <form  action="{{ route('calificacontroller.edit2',$empleado) }}" method="post" class="row g-3">
            @csrf
            @method('POST')
            <input type="hidden" name="id_empleado" value="{{ $empleado->id_empleado }}">

            <div class="col-md-6">
            <label for="periodo" class="form-label">Periodo</label>
            <select id="periodo" class="form-select shadow-none" name="id_periodo" value= "">
               @foreach($periodos as $periodo)
               <option value="{{ $periodo->id_periodo}}" {{$periodo->estatus == "actual" ? "selected": ""}} >{{$periodo->mes}}</option>
               @endforeach
              </select>
              </div>

            <div class="col-md-6">
            <label for="id_area" class="form-label">Area</label>
              @if(sizeof($areas) > 0)
               @foreach($areas as $area)
               <div>
               <input value="{{ $area->id_area}}" type="checkbox" name='id_area[]'>
               <label for="" class="form-label">{{$area->nombre_area}}</label>
               </div>
               @endforeach
               @else
               <div class="alert alert-secondary">No se encontraron resultados.</div>
               @endif
              </div>  
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Ir a calificar</button>
              </div>
            </form>
        </div>
        
    </div>
</div>
@endsection