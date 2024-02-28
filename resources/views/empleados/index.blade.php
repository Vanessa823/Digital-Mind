@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            </div>
            @endif
            @if (session('success1'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success1')}}
            </div>
            @endif
            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('danger')}}
            </div>
            @endif
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar empleado" href="{{ route('empleados.create')}}"> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof($empleados)>0)
                <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Nombre de empleado</th>
                <th scope="col">Puesto</th>
                <th scope="col">Calificar</th>
                
                
            </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td class="text-center" width="20%">
                        <a href="{{route('empleados.show',$empleado)}}" class="btn btn-primary btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Ver detalles">
                            <i class="fa fa-address-card fa-fw text-white"></i></a>
                        </a>
                        <a href="{{route('empleados.edit',$empleado)}}" class="btn btn-warning btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Editar empleado">
                            <i class="fa fa-pencil-square-o fa-fw "></i></a>
                        </a>
                        <form action="{{route('empleados.destroy',$empleado)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')    
                        <button id="delete" name="delete" type="submit" 
                                    class="btn btn-dark btn-sm shadow-none" 
                                    data-toggle="tooltip" data-placement="top" title="Eliminar empleado"
                                    onclick="return confirm('¿Estás seguro de eliminar?')">
                                <i class="fa fa-trash-o fa-fw text-white"></i>
                            </button>
                        </form>
                    </td>
                    <td scope="row">{{ $empleado->id_empleado }}</td>
                    <td scope="row">{{ $empleado->nombre_empleado }}</td>

                    <td scope="row">{{ $empleado->puesto }}</td>

                    <td scope="row">
                    <a href="{{route('CalificaController.edit2',$empleado)}}" class="btn btn-success btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Calificar">
                            <i class="fa fa-check-square-o"></i></a>
                        </a>
                    <a href="{{route('calificacontroller.show',$empleado)}}" class="btn btn-info btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="ver">
                        <i class="fa fa-eye"></i></a>
                    </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {!! $empleados->links() !!}
        </div>
    </div>
    @else
        <div class="alert alert-secondary">No se encontraron registros</div>
    @endif
    </div>        
    </div>
</div>
@endsection