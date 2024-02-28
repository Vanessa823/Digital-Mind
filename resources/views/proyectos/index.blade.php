@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Proyecto" href="{{ route('proyectos.create')}}"> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof($proyectos)>0)
                <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Proyecto</th>
                <th scope="col">Avance %</th>
                <th scope="col">Tareas</th>
            </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $proyecto)
                <tr>
                    <td class="text-center" width="20%">
                        <a href="{{route('proyectos.show',$proyecto)}}" class="btn btn-info btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Ver detalles">
                            <i class="fa fa-book fa-fw text-white"></i></a>
                        </a>
                        <a href="{{route('proyectos.edit',$proyecto)}}" class="btn btn-warning btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Editar Proyecto">
                            <i class="fa fa-pencil fa-fw"></i></a>
                        </a>
                        <form action="{{route('proyectos.destroy',$proyecto)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')    
                        <button id="delete" name="delete" type="submit" 
                                    class="btn btn-dark btn-sm shadow-none" 
                                    data-toggle="tooltip" data-placement="top" title="Eliminar Proyecto"
                                    onclick="return confirm('¿Estás seguro de eliminar?')">
                                <i class="fa fa-trash-o fa-fw text-white"></i>
                            </button>
                        </form>
                    </td>
                    <td scope="row">{{ $proyecto->id_proyecto }}</td>
                    <td scope="row">{{ $proyecto->nombre_proyecto }}</td>
                    <td scope="row">{{ $proyecto->avance }} %</td>
                    <td>
                    <a href="{{route('proyectos.edit2',$proyecto)}}" class="btn btn-secondary btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Gestionar Tareas">
                            <i class="fa fa-list fa-fw text-white"></i></a>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {!! $proyectos->links() !!}
        </div>
    </div>
    @else
        <div class="alert alert-secondary">No se encontraron registros</div>
    @endif
    </div>        
    </div>
</div>
@endsection