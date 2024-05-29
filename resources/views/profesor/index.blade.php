@extends('adminlte::page')
@section('title', 'Cursos')

@section('content_header')

<div class="row justify-content-center align-items-center g-2">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br>
        <br>
        <h3>Registro de Notas</h3>



        <div class="float-right">
            <a href="{{route('calificaciones.create')}}" class="float-right btn btn-info btn-sm" data-placement="left">
                {{ __('Registar Calificacion') }}
            </a>

        </div>
        <br>


        <div class="mt-3 table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead">
                    <tr>
                        <th hidden>ID</th>
                        <th scope="col">Nota 1</th>
                        <th scope="col">Nota 2</th>
                        <th scope="col">Nota 3</th>
                        <th scope="col">Nota 4</th>
                        <th scope="col">Definitiva</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $calificaciones as $calificacion )
                        <tr class="">
                            <td>{{$calificacion->nota_1}}</td>
                            <td>{{$calificacion->nota_2}}</td>
                            <td>{{$calificacion->nota_3}}</td>
                            <td>{{$calificacion->nota_4}}</td>
                            <td>{{$calificacion->nota_definitiva}}</td>
                            <td>{{$calificacion->observaciones}}</td>
                        </tr>
                    </tbody>

                </table>
            </div>


                </tbody>
                @endforeach
            </table>
        </div>



        @include('profesor.modal')


    </div>
    <div class="col-md-2"></div>
</div>
@endsection

<div class="container-fluid">
