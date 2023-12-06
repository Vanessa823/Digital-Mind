@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('warning') }}
            </div>
            @endif
            <div class="col-md-9">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('proyectos.index') }}"> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-9">
            <form  action="{{ route('proyectos.updateEstado',$proyecto) }}" method="post" class="row g-3">
            @csrf
            @method('POST')
                    <div class="col-md-9">
                        <label for="categorias" class="form-label">Gestion de Tareas del proyecto:   {{$proyecto->nombre_proyecto}} </label><br>
                    </div>
                  @if(sizeof($tareas) > 0)
                    <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    
                        <th scope="col">Tareas</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach ($proyecto->tareas as $tarea)
                      <tr>
                      <td scope="row">{{$tarea->descripcion}} </td>
                      <td scope="row">
                          <div>
                          <label>Pendiente</label>
                         <input type="checkbox" class="checkbox-tarea"  name="estados[{{$tarea->id_tarea}}]" data-tarea-id="estado_{{$tarea->id_tarea}}" value="pendiente"
                         {{ $tarea->pivot->estado == 'pendiente' ? 'checked' : '' }} >

                          <label>Hecha</label>
                         <input type="checkbox" class="checkbox-tarea" name="estados[{{$tarea->id_tarea}}]" data-tarea-id="estado_{{$tarea->id_tarea}}" value="hecha"
                         {{ $tarea->pivot->estado == 'hecha' ? 'checked' : '' }} >
                          </div>
                          
                      </td>
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
              
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
            
        </div>
    </div>
</div>
@endsection