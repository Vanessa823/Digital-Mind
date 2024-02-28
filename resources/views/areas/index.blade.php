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
            <div class="col-md-10">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Area" href="{{ route('areas.create')}}"> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                
            </div>
            
            <div class="col-md-10">
                @if(sizeof($areas)>0)
                <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Areas</th>
            </tr>
            </thead>
            <tbody>
                @foreach($areas as $area)
                <tr>
                    <td class="text-center" width="20%">
                        <a href="{{route('areas.show',$area)}}" class="btn btn-info btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Ver detalles">
                            <i class="fa fa-book fa-fw text-white"></i></a>
                        </a>
                        <a href="{{route('areas.edit',$area)}}" class="btn btn-warning btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Editar Area">
                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                        </a>
                        
                    </td>
                    <td scope="row">{{ $area->id_area }}</td>
                    <td scope="row">{{ $area->nombre_area }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {!! $areas->links() !!}
        </div>
    </div>
    @else
        <div class="alert alert-secondary">No se encontraron registros</div>
    @endif
    </div>        
    </div>
</div>
@endsection