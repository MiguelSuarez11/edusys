<div class="modal-body">

    <div class="card-body">
        <form method="post" action="{{ route('profesor.store') }}" role="form"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="tipo_documento">Curso</label>
                    <select name="curso_id">
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}"
                                @if (isset($calificacion) && $calificacion->curso && $curso->id == $calificacion->curso->id)
                                    selected
                                @endif>
                                {{ $curso->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('tipo_documento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>





            <div class="row">

                <div class="col-6">
                    <label for="" class="form-label">Nota 1</label>
                    <input type="int" class="form-control" name="nota1" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="group col-6">
                    <label for="" class="form-label">Nota 2</label>
                    <input type="int" class="form-control" name="nota2" aria-describedby="helpId"
                        placeholder="" />
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Nota 3</label>
                    <input type="int" class="form-control" name="nota3" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Nota 4</label>
                    <input type="int" class="form-control" name="nota4" aria-describedby="helpId"
                        placeholder="" />
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">Definitiva</label>
                    <input type="int" class="form-control" name="definitiva" aria-describedby="helpId"
                        placeholder="" />
                </div>
            </div>





    </div>



</div>

