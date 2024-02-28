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
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('criterios.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('criterios.update',$criterio) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Nombre de criterio</label>
                <input type="text" class="form-control shadow-none" id="nombre_criterio" name="nombre_criterio" value="{{$criterio->nombre_criterio}}">
                @error('nombre_criterio') 
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