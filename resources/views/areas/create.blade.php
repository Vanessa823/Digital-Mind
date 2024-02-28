@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                href="{{route('areas.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{route('areas.store')}}" method="POST" class="row g-3">
                 @csrf
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre de area</label>
                <input type="text" class="form-control shadow-none" id="nombre_area" name="nombre_area" value="{{old('nombre_area')}}">
                @error('nombre_area') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
              <div class="col-md-6">
                <label for="tareas" class="form-label">Criterios</label><br>
                  
                @if(sizeof($criterios) > 0)
                  @foreach ($criterios as $id_criterio => $nombre_criterio)
                      <div>
                      <input type="checkbox" 
                             value="{{ $id_criterio }}" 
                             name="criterios[]" 
                      {{ ( is_array(old ( 'criterios' ) ) && in_array($id_criterio, old ('criterios' )) ) ? ' checked ' : '' }}>
                      {{ $nombre_criterio }}
                      </div>
                  @endforeach
                  <br>
                  @error('criterios')
                      <small class="text-danger" role="alert">
                          {{ $message }}
                      </small>
                  @enderror
                  @else
                    <div class="alert alert-secondary">No se encontraron criterios registrados.</div>
                    @error('criterios')
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