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
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('areas.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('areas.update',$area) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="criterios" class="form-label">Criterios</label><br>
                  
                @if(sizeof($criterios) > 0)
                  @foreach ($criterios as $id_criterio => $nombre_criterio)
                      <div>
                      <input type="checkbox" 
                             value="{{ $id_criterio }}" 
                             name="criterios[]" 
                     
                      {{ $area->criterios->pluck('id_criterio')->contains($id_criterio) ? 'checked' : ''}}
                      >
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
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                    @error('criterios')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                @endif
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">actualizar</button>
              </div>
            </form>
            </form>

        </div>
    </div>
</div>
@endsection
