@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Calendar</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-body">
                <!-- the events -->
                <div id="external-events">
                    <div class="checkbox">
                        <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            Remove after drop
                        </label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        /* initialize the external events */
        function ini_events(ele) {
            ele.each(function () {
                var eventObject = {
                    title: $.trim($(this).text())
                };
                $(this).data('eventObject', eventObject);
                $(this).draggable({
                    zIndex: 1070,
                    revert: true,
                    revertDuration: 0
                });
            });
        }
        ini_events($('#external-events div.external-event'));

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color')
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            events: [
                {
                    title: 'All Day Event',
                    start: new Date().setDate(1),
                    backgroundColor: '#f56954',
                    borderColor: '#f56954',
                    allDay: true
                },
                {
                    title: 'Long Event',
                    start: new Date().setDate(new Date().getDate() - 5),
                    end: new Date().setDate(new Date().getDate() - 2),
                    backgroundColor: '#f39c12',
                    borderColor: '#f39c12'
                },
                {
                    title: 'Meeting',
                    start: new Date().setHours(10, 30),
                    allDay: false,
                    backgroundColor: '#0073b7',
                    borderColor: '#0073b7'
                },
                {
                    title: 'Lunch',
                    start: new Date().setHours(12, 0),
                    end: new Date().setHours(14, 0),
                    allDay: false,
                    backgroundColor: '#00c0ef',
                    borderColor: '#00c0ef'
                },
                {
                    title: 'Birthday Party',
                    start: new Date().setDate(new Date().getDate() + 1),
                    start: new Date().setHours(19, 0),
                    end: new Date().setHours(22, 30),
                    allDay: false,
                    backgroundColor: '#00a65a',
                    borderColor: '#00a65a'
                },
                {
                    title: 'Click for Google',
                    start: new Date().setDate(28),
                    end: new Date().setDate(29),
                    url: 'https://www.google.com/',
                    backgroundColor: '#3c8dbc',
                    borderColor: '#3c8dbc'
                }
            ],
            editable: true,
            droppable: true,
            drop: function(info) {
                if (checkbox.checked) {
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
    });
</script>
@endsection
