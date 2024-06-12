@extends('adminlte::page')

@section('title', 'Pagina - Principal')

@section('content_header')
    <h1>Horarios</h1>
@stop

@section('content')

        <div class="container">
            <!-- Formulario para añadir cursos -->

            @can('admin.dashboard')
            <!-- Selector de cursos -->
            <div class="mt-4 form-group">
                <label for="courseSelect">Seleccionar Curso</label>
                <select id="courseSelect" class="form-control">
                    <option value="">Selecciona un curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @endcan


            <div id='calendar' class="mt-4"></div>
        </div>

@stop

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @can('admin.dashboard')
        <script type="text/javascript">
            $(document).ready(function() {
                var SITEURL = "{{ url('/') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#addCourseForm').on('submit', function(e) {
                    e.preventDefault();
                    var courseName = $('#courseName').val();
                    $.ajax({
                        url: SITEURL + "/addCourse",
                        data: {
                            name: courseName
                        },
                        type: "POST",
                        success: function(data) {
                            toastr.success("Curso añadido exitosamente");
                            $('#courseName').val('');
                            loadCourses();
                        }
                    });
                });

                function loadCourses() {
                    $.ajax({
                        url: SITEURL + "/courses",
                        type: "GET",
                        success: function(courses) {
                            var select = $('#courseSelect');
                            select.empty();
                            select.append('<option value="">Selecciona un curso</option>');
                            courses.forEach(function(course) {
                                select.append('<option value="' + course.id + '">' + course.nombre +
                                    '</option>');
                            });
                        }
                    });
                }

                loadCourses();

                $('#courseSelect').on('change', function() {
                    calendar.fullCalendar('refetchEvents');
                });

                var calendar = $('#calendar').fullCalendar({
                    locale: 'es',
                    editable: true,
                    events: function(start, end, timezone, callback) {
                        $.ajax({
                            url: SITEURL + "/fullcalender",
                            type: "GET",
                            data: {
                                start: start.format(),
                                end: end.format(),
                                course_id: $('#courseSelect').val()
                            },
                            success: function(data) {
                                callback(data);
                            }
                        });
                    },
                    displayEventTime: true,
                    selectable: true,
                    selectHelper: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'agendaDay,agendaWeek,month'
                    },
                    defaultView: 'agendaWeek',
                    allDaySlot: false,
                    slotDuration: '0:30:00',
                    minTime: '06:00:00',
                    maxTime: '17:00:00', // Añadir esta línea para establecer la hora máxima
                    slotLabelFormat: 'h(:mm)a',
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },

                    select: function(start, end, allDay) {
                        var title = prompt('Título del evento:');
                        var courseId = $('#courseSelect').val();
                        if (title && courseId) {
                            var start = moment(start).format("YYYY-MM-DD HH:mm:ss");
                            var end = moment(end).format("YYYY-MM-DD HH:mm:ss");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    course_id: courseId,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function(data) {
                                    displayMessage("Evento creado exitosamente");

                                    calendar.fullCalendar('renderEvent', {
                                        id: data.id,
                                        title: title + ' (' + data.course.name + ')',
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    }, true);

                                    calendar.fullCalendar('unselect');
                                    calendar.fullCalendar('refetchEvents');
                                }
                            });
                        } else {
                            alert('Por favor selecciona un curso antes de añadir un evento.');
                        }
                    },
                    eventDrop: function(event, delta) {
                        var start = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
                        var end = moment(event.end).format("YYYY-MM-DD HH:mm:ss");

                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update',
                                course_id: $('#courseSelect').val()
                            },
                            type: "POST",
                            success: function(response) {
                                displayMessage("Evento actualizado exitosamente");
                            }
                        });
                    },
                    eventClick: function(event) {
                        var deleteMsg = confirm("¿Realmente quieres eliminar el evento?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                    id: event.id,
                                    type: 'delete'
                                },
                                success: function(response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Evento eliminado exitosamente");
                                }
                            });
                        }
                    }
                });

                function displayMessage(message) {
                    toastr.success(message, 'Evento');
                }
            });
        </script>
    @endcan

    <script type="text/javascript">
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#courseSelect').on('change', function() {
                calendar.fullCalendar('removeEvents');
                calendar.fullCalendar('refetchEvents');
            });

            var calendar = $('#calendar').fullCalendar({
                locale: 'es',
                editable: false, // Establecer editable en false para hacer el calendario de solo lectura
                events: function(start, end, timezone, callback) {
                    $.ajax({
                        url: SITEURL + "/fullcalender",
                        type: "GET",
                        data: {
                            start: start.format(),
                            end: end.format(),
                            course_id: $('#courseSelect').val()
                        },
                        success: function(data) {
                            callback(data);
                        }
                    });
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaDay,agendaWeek,month'
                },
                defaultView: 'agendaWeek',
                allDaySlot: false,
                slotDuration: '00:30:00',
                minTime: '01:00:00',
                slotLabelFormat: 'h(:mm)a',
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                }
                // Otras opciones del calendario...
            });
        });
    </script>

@endpush
