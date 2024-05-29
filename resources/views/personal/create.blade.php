@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Editar personal') }}
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
                        <form method="POST" action="{{ route('personal.store', $personal) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('personal.form')
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


