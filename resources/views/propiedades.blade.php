@extends('layouts.plantilla-admin')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center display-4">Reservas</h3> 
        </div>
    </div> 
    {{--  tabla   --}}
    <div class="row mt-5 mb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-footer">
                    <div class="w-100 table-responsive">
                            <table class= "table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th><button type="button" class="btn w-100 btn-info btn-sm" data-toggle="modal" data-target="#modalCrearCliente"><i class="fas fa-plus"></i></button></th>
                                        <th colspan="8">
                                            <form method="POST" action="{{route('propiedadesfiltroname')}}">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" placeholder="Ingrese No de reserva" name="id" autocomplete="off" id="nameFiltro">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-primary" type="button" onclick="$('#nameFiltro').val('')"><i class="fas fa-eraser"></i></a>
                                                    </div>
                                                </div> 
                                            </form>                                        
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No Reserva</th>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Apellidos</th>
                                        <th class="text-center">Piso</th>
                                        <th class="text-center">Habitacion</th>
                                        <th class="text-center">Inicio Contrato</th>
                                        <th class="text-center">Fin de Contrato</th>
                                        <th class="text-center">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                        @forelse($propiedades as $usu)
                        {{--  dd($propiedades);  --}}
                                    <tr>
                                        <td class="text-center">{{$usu->id}}</td>
                                        <td class="text-center">{{$usu->nombres}}</td>
                                        <td class="text-center">{{$usu->apellidos}}</td>
                                        <td class="text-center">{{$usu->piso}}</td>
                                        <td class="text-center">{{$usu->habitacion}}</td>
                                        <td class="text-center">{{$usu->inicio_contrato}}</td>
                                        <td class="text-center">{{$usu->fin_contrato}}</td>
                                        <td class="d-flex justify-content-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal1{{$usu->id}}"><i class="fas fa-user-edit"></i></button>
                                                <form action="{{ route('propiedades.destroy',$usu->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                        {{--  editar   --}}
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="modal fade" id="myModal1{{$usu->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Reservas</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                <form class="col-12" method="POST" action="{{route('propiedadesactualizar')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input value="{{$usu->id}}" type="hidden" class="form-control" name="id">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nombre</label>
                                                                        <input type="text" class="form-control" name="nombres" value="{{$usu->nombres}}" aria-describedby="emailHelp" placeholder="Ingresar nombre completo" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Apellidos</label>
                                                                        <input type="text" class="form-control" name="apellidos" value="{{$usu->apellidos}}" aria-describedby="emailHelp" placeholder="Ingrese direccion" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Piso</label>
                                                                        <input type="text" class="form-control" name="piso" value="{{$usu->piso}}" aria-describedby="emailHelp" placeholder="Ingrese valor de la propiedad" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Habitacion</label>
                                                                        <input type="text" class="form-control" name="habitacion" value="{{$usu->habitacion}}" aria-describedby="emailHelp" placeholder="Ingrese el codigo internacional" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Inicio Contrato</label>
                                                                        <input type="date" class="form-control" name="inicio_contrato"  value="{{$usu->inicio_contrato}}" aria-describedby="emailHelp"  required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Fin de Contrato</label>
                                                                        <input type="date" class="form-control" name="fin_contrato"  value="{{$usu->fin_contrato}}" aria-describedby="emailHelp"  required>
                                                                    </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Editar Reservas</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  editar   --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros</td>
                                    </tr>
                        @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            @if($propiedades != null)
                                                {{$propiedades->links()}}
                                                {{--  {{$clientes->appends(['busqueda'=>$busqueda])}}  --}}
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {{--  tabla   --}}

    <div class="modal fade" id="modalCrearCliente" role="dialog">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Reservas</h4>
                    </div>
                    <div class="modal-body">
                            <form class="col-12" method="POST"  action="{{route('propiedades.insertar')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" name="nombres" aria-describedby="emailHelp" placeholder="Ingresar nombre completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" aria-describedby="emailHelp" placeholder="Ingrese direccion" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Piso</label>
                                    <input type="number" class="form-control" name="piso" aria-describedby="emailHelp" placeholder="Ingrese valor de la propiedad" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Habitacion</label>
                                    <input type="number" class="form-control" name="habitacion" aria-describedby="emailHelp" placeholder="Ingrese el codigo internacional" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Inicio Contrato</label>
                                    <input type="date" class="form-control" name="inicio_contrato" aria-describedby="emailHelp"  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fin de Contrato</label>
                                    <input type="date" class="form-control" name="fin_contrato" aria-describedby="emailHelp"  required>
                                </div>
                    </div>
                    <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Registrar Reservas</button>
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
        </div>
    </div>

</div>
@endsection