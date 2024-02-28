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
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('periodos.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('periodos.update',$periodo) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="mes" class="form-label">Mes evaluable</label>
                <input type="text" class="form-control shadow-none" id="mes" name="mes" value="{{$periodo->mes}}">
                @error('mes') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
            </div>
            <div class="col-md-6">
                <label for="estatus"  class="form-label">Estatus</label><br>
                <select name="estatus" class="form-select shadow-none" id="estatus">
                    <option value="evaluado" {{ ($periodo->estatus =='evaluado') ? 'select' : ''}}>Evaluado</option>
                    <option value="actual"  {{( $periodo->estatus =='actual' )? 'select' : ''}}>Actual</option>
                    <option value="futuro" {{( $periodo->estatus =='futuro' ) ? 'select' : ''}}>Futuro</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
                @error('mes') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
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