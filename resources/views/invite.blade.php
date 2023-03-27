@extends('_layouts.index')

@section('content')
    <div class="master_sections fadeIn">
        <div class="master_sections_layer row text-center justify-content-center">
            <div class="col-lg-12 text_grey">
                Undangan Pernikahan

                <div class="invitor handwriter text_light">
                    Nabila <br> & <br> Irfan
                </div>
            </div>
            <div class="col-lg-12 invitee text_light">
                <div class="dear">Kepada : Fauzan</div>
                <button class="btn btn-sm btn-custom btn-light" onclick="played()">
                    Buka Undangan
                </button>
            </div>
        </div>
    </div>
    <div class="invite_sections fadeIn d-none" id="invite_section">
        @include('_partials.navigation')
        @include('_partials.home')
        @include('_partials.tours')
        {{-- @include('_partials.about') --}}
        @include('_partials.event')
        @include('_partials.tour')
        @include('_partials.rsvp')
        @include('_partials.gallery')
        {{-- @include('_partials.donate') --}}
        @include('_partials.letter')
    </div>
@endsection

@section('script')
    <script>
        let loc = window.location.pathname

        let p = true
        let op = false
        const audio = document.querySelector("audio");


        $(document).ready(function() {
            window.scrollTo(0, 0);
            // const url = new URL(window.location);
            // url.hash = '';
            // history.replaceState(null, document.title, url);
            // audio.volume = 1;
            // audio.play();
            // played();

        });

        function played() {
            let pageHeight = window.innerHeight;
            window.scrollBy(0, pageHeight);
            $(".invite_sections").removeClass('d-none');
            $(".master_sections").addClass('d-none');
            audios();
        }

        function audios() {
            $('.play').html('');
            p = !p
            if (p === false) {
                $('.play').append(`
                    <i class="fas fa-pause"></i>
                `)
                audio.volume = 1;
                audio.play();
            } else {
                audio.pause();
                $('.play').append(`
                    <i class="fas fa-play"></i>
                `)
            }
        }

        function pause() {
            audios();
            $(".invite_sections").addClass('d-none');
            $(".master_sections").removeClass('d-none');

            window.scrollTo(0, 0);

        }
    </script>
@stop
