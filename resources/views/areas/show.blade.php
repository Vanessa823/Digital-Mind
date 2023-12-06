@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                title="Inicio" href="{{route('areas.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mx-auto" style="width: 100%;">
              <div class="card-header">
                Area
              </div>
              <div class="card-body text">
                <h5 class="card-title">{{$area->nombre_area}}</h5>
              </div>
            </div>
        </div>
           <div class="col-md-12">
                  
                @if(sizeof($criterios) > 0)
                
              <div class="table-responsive">
              <table class="table table-hover">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Criterios</th>
                
            </tr>
            </thead>
            <tbody>
                  @foreach ($criterios as $id_criterio => $nombre_criterio)
                      <tr>
                      
                      @if($area->criterios->pluck('id_criterio')->contains($id_criterio)) 
                      <td scope="row">{{$id_criterio}} </td>
                      <td scope="row">{{$nombre_criterio}} </td>
                                          
                      @endif
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
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
    </div>
</div>

@endsection