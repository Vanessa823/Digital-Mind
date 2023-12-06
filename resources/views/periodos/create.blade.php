@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                href="{{route('periodos.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{route('periodos.store')}}" method="POST" class="row g-3">
                 @csrf
              <div class="col-md-6">
                <label for="mes" class="form-label">Mes evaluable</label>
                <input type="text" class="form-control shadow-none" id="mes" name="mes" value="{{old('mes')}}">
                @error('nombre_criterio') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
              <div class="col-md-6">
                <label for="estatus" class="form-label">Estatus</label>
                <select name="estatus" id="estatus">
                    <option value="evaluado">Evaluado</option>
                    <option value="actual">Actual</option>
                    <option value="futuro">Futuro</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
                @error('nombre_criterio') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
             
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection