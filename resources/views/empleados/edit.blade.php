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
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('empleados.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('empleados.update',$empleado) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre del Empleado</label>
                <input type="text" class="form-control shadow-none" id="nombre_empleado" name="nombre_empleado" value="{{$empleado->nombre_empleado}}">
                @error('nombre_empleado') 
                    <small class="text-danger">
                        {{$message}}
                    </small>    
                @enderror 
            </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Puesto</label>
                <input type="text" class="form-control shadow-none" id="puesto" name="puesto" value="{{$empleado->puesto}}">
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Email</label>
                <input type="email" class="form-control shadow-none" id="email" name="email" value="{{$empleado->email}}">
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Numero de telefono</label>
                <input type="text" class="form-control shadow-none" id="telefono" name="telefono" value="{{$empleado->telefono}}">
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