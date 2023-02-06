@extends('layouts.app')

@section('template_title')
    Citum
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Calendario
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input type="date" value="<?= date("Y-m-d") ?>" class="form-control" id="fecha" onchange="cambiaFecha()">
                            </div>
                        </div>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
<script>
    var calendar;
    
    function cambiaFecha() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/calendarioDe/"+document.getElementById("fecha").value, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                calendar.removeAllEvents();
                
                let json=JSON.parse(this.response);
                for (var item of json) {
                    let obj=new Object();
                    obj.id=item.id;
                    obj.title="Cita pendiente";
                    obj.start=item.fecha.replace(" ","T");

                    calendar.addEvent(obj);
                }
                
                calendar.gotoDate(document.getElementById("fecha").value);
            } else {
                // error
                console.log("Ha ocurrido algo inesperado, por favor recargue la página e intente de nuevo\n\nCódigo: " + this.status + " " + this.statusText + "");
            }
        };
        xhr.send();
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            initialView: 'timeGridOneDay',
            headerToolbar: {
                left: '', center: '', right: ''
            },
            views: {
                timeGridOneDay: {
                    type: 'listWeek',duration: { days: 1 },buttonText: '1 day'
                }
            },
            events: []
        });
        calendar.render();
        cambiaFecha();
    });
</script>
@endsection
