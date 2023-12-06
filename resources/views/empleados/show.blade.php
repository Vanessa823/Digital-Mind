@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                title="Inicio" href="{{route('empleados.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mx-auto" style="width: 50%;">
              <div class="card-header">
                Empleado
              </div>
              <div class="card-body text-center">
                <h5 class="card-title"><b>{{$empleado->nombre_empleado}}</b></h5>
                <h5 class="card-title"><b>Puesto: {{$empleado->puesto}}</b></h5>
                <h5 class="card-title"><b>Email: {{$empleado->email}}</b></h5>
                <h5 class="card-title"><b>Num. Telefono {{$empleado->telefono}}</b></h5>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection