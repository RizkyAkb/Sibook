@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">

                        <div class="row my-4">
                            <div class="col-md-5">
                                <h3>DJAGOS FUTSAL</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum quo placeat reiciendis
                                    adipisci vel ut. Quo ab, ut suscipit inventore aspernatur illum, tenetur voluptatem,
                                    earum natus eligendi molestias officiis non!</p>
                                @guest
                                    <a class="btn btn-primary my-2" href="{{ url('booking/create') }}">BOOKING LAPANGAN</a>
                                @endguest
                                @role('Member')
                                    <a class="btn btn-primary my-2" href="{{ url('member/topup') }}">TOP UP DEPOSIT</a>
                                @endrole
                            </div>
                            <div id='calendar' class="col-md-7"></div>
                        </div>
                    </div>

                    <!-- Carousel wrapper -->
                    <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center"
                        data-mdb-ride="carousel">
                        <div class="carousel-inner py-4">
                            <h2 class="mt-5">Galeri Kami</h2>
                            <p>Lorem ipsum dolor sit amet. <br>
                                Orci varius natoque penatibus et magnis dis parturient montes, nascetur. </p>
                            <!-- Single item -->
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/181.webp"
                                                    class="card-img-top" alt="Waterfall" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4 d-none d-lg-block">
                                            <div class="card">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                                    class="card-img-top" alt="Sunset Over the Sea" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4 d-none d-lg-block">
                                            <div class="card">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/183.webp"
                                                    class="card-img-top" alt="Sunset over the Sea" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Inner -->
                    </div>
                    <!-- Carousel wrapper -->

                    <div class="d-flex justify-content-md-between ">
                        <div class="col-md-5 m-5">
                            <div class="d-flex justify-content-md-start">
                                <h2>Lokasi</h2>
                            </div>
                            <div style="width: 100%">
                                <iframe scrolling="no" marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                    width="100%" height="400" frameborder="0"><a
                                        href="https://www.maps.ie/distance-area-calculator.html">measure distance on
                                        map</a></iframe>
                            </div>
                        </div>
                        <div class="col-md-5 m-5">
                            <div class="d-flex justify-content-md-start">
                                <h2>Tentang Kami</h2>
                            </div>
                            <p class="text-justify">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
                                est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam
                                libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus
                            </p>
                        </div>
                    </div>

                    {{-- {{ $jadwals }} --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    dayMaxEvents: true,
                    popover: true,
                    editable: true,
                    selectable: true,
                    displayEventTime: true,
                    headerToolbar: {
                        @guest
                        left: 'today,next',
                    @else
                        left: 'prev,next,today',
                    @endguest
                    center: 'title',
                    right: 'dayGridWeek,dayGridMonth' // user can switch between the two
                },
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                },
                events: [
                    @foreach ($jadwals as $jadwal)
                        {
                            title: '{{ $jadwal->nama_pemesan }}',                            
                            start: '{{ $jadwal->tanggal_main }}T{{ $jadwal->nama_sesi }}',
                            // end: '2023-06-08T07:30',
                            backgroundColor: 'red',
                            borderColor: 'red'
                        },
                    @endforeach
                ],

            }); calendar.render();
        });
    </script>
@endsection
