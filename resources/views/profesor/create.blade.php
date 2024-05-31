@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
    {{ __('Crear Calificacion') }}
</h2>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('') }}</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personal.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('profesor.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('profesor.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


