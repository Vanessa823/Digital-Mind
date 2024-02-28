@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                href="{{route('proyectos.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{route('proyectos.store')}}" method="POST" class="row g-3">
                 @csrf
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre del proyecto</label>
                <input type="text" class="form-control shadow-none" id="nombre_proyecto" name="nombre_proyecto" value="{{old('nombre_proyecto')}}">
                @error('nombre_proyecto') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Fecha de inicio</label>
                <input type="date" class="form-control shadow-none" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}">
                @error('fecha_inicio') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Fecha de entrega</label>
                <input type="date" class="form-control shadow-none" id="fecha_entrega" name="fecha_entrega" value="{{old('fecha_entrega')}}">
                @error('fecha_entrega') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
                <div class="col-md-6">
                <label for="tareas" class="form-label">Tareas</label><br>
                  
                @if(sizeof($tareas) > 0)
                  @foreach ($tareas as $id_tarea => $descripcion)
                      <div>
                      <input type="checkbox" 
                             value="{{ $id_tarea }}" 
                             name="tareas[]" 
                      {{ ( is_array(old ( 'tareas' ) ) && in_array($id_tarea, old ('tareas' )) ) ? ' checked ' : '' }}>
                      {{ $descripcion }}
                      </div>
                  @endforeach
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
              <div class="col-md-6">
                <label for="empleados" class="form-label">Empleados</label><br>
                  @if(sizeof($empleados) > 0)
                  @foreach ($empleados as $id_empleado => $nombre_empleado)
                    <div>
                      <input type="checkbox" 
                             value="{{ $id_empleado }}" 
                             name="empleados[]" 
                      {{ ( is_array(old('empleados' ) ) && in_array($id_empleado, old('empleados' )) ) ? ' checked ' : '' }}>
                      {{ $nombre_empleado }}
                    </div>
                  @endforeach
                  <br>
                  @error('empleados')
                      <small class="text-danger" role="alert">
                          {{ $message }}
                      </small>
                  @enderror
                  @else
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                    @error('empleados')
                      <small class="text-danger" role="alert">
                          {{ $message }}
                      </small>
                  @enderror
                @endif
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection