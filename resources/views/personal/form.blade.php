<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <!-- Columnas para web -->
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    <select name="tipo_documento" class="form-control  @error('tipo_documento') is-invalid @enderror" id="tipo_documento">
                        <option value="">Seleccionar Tipo de Documento</option>
                        @foreach ($tiposDocumentos as $id => $nombre)
                            <option value="{{ $id }}" @if ($personal->tipoDocumento && $id == $personal->tipoDocumento->id) selected @endif>
                                {{ $nombre }}</option>
                        @endforeach
                    </select>
                    @error('tipo_documento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="numero_documento">Numero de Documento</label>
                    <input type="text" class="form-control @error('numero_documento') is-invalid @enderror" name="numero_documento" id="numero_documento" placeholder="Numero de Documento" value="{{ old('numero_documento', isset($personal) ? $personal->numero_documento : '') }}">
                    @error('numero_documento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Agregue sus Nombres" id="nombres"
                        value="{{ old('nombres', isset($personal) ? $personal->nombres : '') }}">

                </div>

                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Agregue sus apellidos" id="apellidos"
                        value="{{ old('apellidos', isset($personal) ? $personal->apellidos : '') }}">

                </div>
                <div class="form-group">
                    <label for="cursos">Curso</label>
                    <select name="cursos" class="form-control" id="cursos">
                        <option value=""> Seleccion tu Curso</option>
                        @foreach ($cursos as $id => $nombre)
                            <option value="{{ $id }}" @if ($id == $personal->cursos) selected @endif>
                                {{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="direccion">Direccion </label>
                    <input type="text" class="form-control" name="direccion" placeholder="Agregue su direccion" id="direccion"
                        value="{{ old('direccion', isset($personal) ? $personal->direccion : '') }}">
                </div>
                <div class="form-group">
                    <label for="correo">correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="Agregue su correo" id="correo"
                        value="{{ old('correo', isset($personal) ? $personal->correo : '') }}">
                </div>
                <div class="form-group">
                    <label for="fech_nacimiento">fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fech_nacimiento" id="fech_nacimiento"
                        value="{{ old('fecha_nacimiento', isset($personal) ? $personal->fech_nacimiento : '') }}">
                </div>

                <div class="form-group">
                    <label for="telefono">telefono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Agregue su telefono" id="telefono"
                        value="{{ old('telefono', isset($personal) ? $personal->telefono : '') }}">

                </div>
                <div class="form-group">
                    <label for="genero">Genero</label>
                    <select name="genero" class="form-control" id="genero">
                        <option value="">Seleccionar Genero</option>
                        @foreach ($generos as $id => $nombre)
                            <option value="{{ $id }}" @if ($id == $personal->genero) selected @endif>
                                {{ $nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control" id="rol">
                        <option value="">Seleccionar rol</option>
                        @foreach ($roles as $id => $name)
                            <option value="{{ $id }}"
                                {{ is_array($userRoles) && in_array($id, $userRoles) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
    </div>
</div>
