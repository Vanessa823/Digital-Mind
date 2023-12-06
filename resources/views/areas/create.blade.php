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
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection