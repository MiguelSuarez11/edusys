@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')
    <div class="container text-center">
        <h1 class="mb-4">¡Bienvenido al Sistema de Gestion EduSys+!</h1>
        <h5 class="mb-4"> Coordial saludo, <br><b>{{ Auth::user()->name }}</b></h5>
        <div class="card">
            {{-- <div class="card-body">
    <p class="lead">
        -- Frase del dia --<br>
        <b>"{{$data['phrase']}}"</b>
      <p class="text-sm text-muted">Autor: {{$data['author']}}</p>
    </p>
    </div> --}}
        @stop

        @section('content')



            <div class="row">



                <div class="col-md-3">
                    <x-adminlte-small-box title="{{ $calificacione }}" text="Ver Calificaciones" icon="fas fa-book text-black"
                        theme="info" url="{{ route('calificaciones.index_calificaciones') }}" url-text="Ver todos.." />
                </div>

                <div class="col-md-3">
                    <x-adminlte-small-box title="{{ $calificacione }}" text="Registrar Calificacion"
                        icon="fas fa-book text-black" theme="info" url="{{ route('calificaciones.create') }}"
                        url-text="Ver todos.." />
                </div>

            </div>




        @stop
        @section('js')
            <script>
                $(document).ready(function() {
                    $('#miTabla').DataTable();
                });
            </script>
            <script>
                $(document).ready(function() {
                    @if (Session::has('success'))
                        Swal.fire({
                            icon: "success",
                            title: '{{ Session::get('tittle') }}',
                            text: '{{ Session::get('success') }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    @endif
                });
            </script>
            <script>
                $(document).ready(function() {
                    // Delegación de eventos para manejar clics en cualquier botón de eliminación
                    $(document).on('click', '.deleteButton', function() {
                        const fichaId = $(this).data('ficha-id');
                        const formId = `#deleteForm-${fichaId}`;

                        Swal.fire({
                            title: '¿Estás seguro?',
                            text: '¡No podrás revertir esto!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí, bórralo',
                            cancelButtonText: 'No, cancelar',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Si el usuario confirma, enviar el formulario de eliminación
                                $(formId).submit();
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                Swal.fire({
                                    title: 'Cancelado',
                                    text: 'Tu acción fue cancelada con éxito',
                                    icon: 'error'
                                });
                            }
                        });
                    });
                });
            </script>

        @stop
