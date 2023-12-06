@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                href="{{route('empleados.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{route('empleados.store')}}" method="POST" class="row g-3">
                 @csrf
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre del empleado</label>
                <input type="text" class="form-control shadow-none" id="nombre_empleado" name="nombre_empleado" value="{{old('nombre_empleado')}}">
                @error('nombre_empleado') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Puesto</label>
                <input type="text" class="form-control shadow-none" id="puesto" name="puesto" value="{{old('puesto')}}">
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Email</label>
                <input type="email" class="form-control shadow-none" id="email" name="email" value="{{old('email')}}">
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Numero de telefono</label>
                <input type="text" class="form-control shadow-none" id="telefono" name="telefono" value="{{old('telefono')}}">
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection