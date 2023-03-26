@extends('_layouts.index')

@section('content')
    <div class="invite_sections">
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
        let p = true
        const audio = document.querySelector("audio");

        $(document).ready(function() {
            audio.volume = 1;
            audio.play();
            played();
        });

        function played() {
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
    </script>
@stop
