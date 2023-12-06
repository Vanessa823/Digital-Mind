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
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar criterio" href="{{ route('criterios.create')}}"> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
           
            <div class="col-md-10">
                @if(sizeof($criterios)>0)
                <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Criterios</th>
                
            </tr>
            </thead>
            <tbody>
                @foreach($criterios as $criterio)
                <tr>
                    <td class="text-center" width="20%">
                        
                        <a href="{{route('criterios.edit',$criterio)}}" class="btn btn-info btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Editar criterio">
                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                        </a>
                        <form action="{{route('criterios.destroy',$criterio)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')    
                        <button id="delete" name="delete" type="submit" 
                                    class="btn btn-dark btn-sm shadow-none" 
                                    data-toggle="tooltip" data-placement="top" title="Eliminar criterio"
                                    onclick="return confirm('¿Estás seguro de eliminar?')">
                                <i class="fa fa-trash-o fa-fw"></i>
                            </button>
                        </form>
                    </td>
                    <td scope="row">{{ $criterio->id_criterio }}</td>
                    <td scope="row">{{ $criterio->nombre_criterio }}</td>
                    
                    

                </tr>

                @endforeach
                
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {!! $criterios->links() !!}
        </div>
    </div>
    @else
        <div class="alert alert-secondary">No se encontraron registros</div>
    @endif
    </div>        
    </div>
</div>
@endsection