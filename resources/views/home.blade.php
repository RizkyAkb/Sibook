@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('DJAGOS FUTSAL') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @guest
                    {{ __('Hallo')}}  
                    <a class="btn btn-primary" href="{{ url('booking/create') }}">PESAN LAPANGAN</a>  

                    @else
                    {{ __('Hallo, ') }} {{ Auth::user()->name }}
                    @endguest

                    <center>
                        <div id='calendar' class="my-4"></div>
                    </center>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                dayMaxEvents: true,
                                popover: true,
                                editable: true,
                                selectable: true,
                                displayEventTime : true,
                                headerToolbar: {
                                    left: 'prev,next,today',
                                    center: 'title',
                                    right: 'dayGridWeek,dayGridMonth' // user can switch between the two
                                },
                                eventTimeFormat: { // like '14:30:00'
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: false
                                },
                                events: [{
                                    title: "My repeating event",
                                    start: '10:00', // a start time (10am in this example)
                                    end: '14:00', // an end time (2pm in this example)
                                    dow: [1, 4], // Repeat monday and thursday
                                    ranges: [{
                                        start: "2023-06-08",
                                        end: "2023-06-08"
                                    }, ]
                                }, {
                                    title: 'FUTSAL FC',
                                    start: '2023-06-08T07:00:00',
                                    end:'2023-06-08T07:30:00',
                                    backgroundColor: 'green',
                                    borderColor: 'green'},
                                //  {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T08:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T09:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T10:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T12:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T13:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T14:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T15:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, {
                                //     title: 'FUTSAL FC',
                                //     start: '2023-06-08T11:00:00',
                                //     backgroundColor: 'green',
                                //     borderColor: 'green'
                                // }, 
                            ],
                    
                            });
                            calendar.render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
