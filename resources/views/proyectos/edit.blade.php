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
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('proyectos.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('proyectos.update',$proyecto) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre del proyecto</label>
                <input type="text" class="form-control shadow-none" id="nombre_proyecto" name="nombre_proyecto" value="{{$proyecto->nombre_proyecto}}">
                @error('nombre_proyecto') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
            </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Fecha de inicio</label>
                <input type="text" class="form-control shadow-none" id="fecha_inicio" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}">
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Fecha de entrega</label>
                <input type="text" class="form-control shadow-none" id="fecha_entrega" name="fecha_entrega" value="{{$proyecto->fecha_entrega}}">
              </div>
              <!-- <div class="col-md-6">
                <label for="descripcion" class="form-label">Porcentaje de avance</label>
                <input type="text" class="form-control shadow-none" id="avance" name="avance" value="{{$proyecto->avance}}">
              </div> -->

              <div class="col-md-6">
                <label for="tareas" class="form-label">Tareas</label><br>
                  @if(sizeof($tareas) > 0)
                  @foreach ($tareas as $id_tarea => $descripcion)
                      <div>
                      <input type="checkbox"
                              id='estado' 
                             value="{{ $id_tarea }}" 
                             name="tareas[]"
                      {{ $proyecto->tareas->pluck('id_tarea')->contains($id_tarea) ? 'checked' : ''}} 
                      >
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
                <label for="autores" class="form-label">Empleados</label><br>
                  @if(sizeof($empleados) > 0)
                  @foreach ($empleados as $id_empleado => $nombre_empleado)
                  <div>
                      <input type="checkbox" value="{{ $id_empleado }}" name="empleados[]"
                      {{ $proyecto->empleados->pluck('id_empleado')->contains($id_empleado) ? 'checked' : ''}} 
                      >
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
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
            </form>

        </div>
    </div>
</div>
@endsection