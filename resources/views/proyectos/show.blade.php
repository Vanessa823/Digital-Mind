@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                title="Inicio" href="{{route('proyectos.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mx-auto" style="width: 100%;">
              <div class="card-header">
                Proyecto
              </div>
              <div class="card-body text">
                <h5 class="card-title">{{$proyecto->nombre_proyecto}}</h5>
                <h5 class="card-title">Inicio {{$proyecto->fecha_inicio}}</h5>
                <h5 class="card-title">Entrega {{$proyecto->fecha_entrega}}</h5>
                <h5 class="card-title">{{$proyecto->avance}} %</h5>
                <h5 class="card-title">Responsables de proyecto:</h5
                @foreach ($empleados as $id_empleado => $nombre_empleado)
                  @if($proyecto->empleados->pluck('id_empleado')->contains($id_empleado)) 
                  <label> {{$nombre_empleado}}<br></label>
                  @endif
                @endforeach
              </div>
            </div>
        </div>
           <div class="col-md-12">
                  
                @if(sizeof($tareas) > 0)
                
              <div class="table-responsive">
              <table class="table table-hover">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tareas asignadas</th>
                <th scope="col">Estado</th>
            </tr>
            </thead>
            <tbody>
                  @foreach ($proyecto->tareas as $tarea)
                      <tr>
                
                      <td scope="row">{{$tarea->id_tarea}} </td>
                      <td scope="row">{{$tarea->descripcion}} </td>
                      <td scope="row">{{$tarea->pivot->estado}} </td>
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
                  <br>
                  @error('tareas')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  @else
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                    @error('tareas')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                @endif
              </div>
              
    </div>
</div>

@endsection