<!DOCTYPE html>
<html>

<head>
    <title>Dependent Dropdown</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory">Subcategory:</label>
            <select name="subcategory" id="subcategory" class="form-control">
                <option value="">Select Subcategory</option>
            </select>
        </div>

        <div class="form-group">
            <label for="curso">Curso:</label>
            <select name="curso" id="curso" class="form-control">
                <option value="">Selecionar curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="estudiantes">Estudiantes:</label>
            <select name="estudiantes" id="estudiantes" class="form-control">
                <option value="">Seleccionar estudiante</option>
            </select>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = this.value;
                $('#subcategory').html('');
                if (categoryId) {
                    $.ajax({
                        url: "{{ url('/subcategories') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subcategory').html(
                                '<option value="">Select Subcategory</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory').html('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
    {{-- estudiantes --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#curso').on('change', function() {
                var cursoId = this.value;
                $('#estudiantes').html('');
                if (cursoId) {
                    $.ajax({
                        url: "{{ url('/estudiantes') }}/" + cursoId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#estudiantes').html(
                                '<option value="">Seleccionar estudiante</option>');
                            $.each(data, function(key, value) {
                                $('#estudiantes').append('<option value="' + value.id +
                                    '">' + value.nombres + '</option>');
                            });
                        }
                    });
                } else {
                    $('#estudiantes').html('<option value="">Seleccionar estudiante</option>');
                }
            });
        });
    </script>
</body>

</html>
