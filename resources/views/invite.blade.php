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
            <div class="dear">Kepada : <br>
                <div id="auths"></div>
            </div>
            <button class="btn btn-sm btn-custom btn-light floating" onclick="played()">
                Buka Undangan
            </button>
        </div>
    </div>
</div>
<div class="invite_sections fadeIn" id="invite_section">
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
    let loc = window.location.pathname.replace('/inv/','')

    let p = true
    let op = false
    const audio = document.querySelector("audio");

    let arr_user = [
        {path:'trah-wonoikromo', name: 'Kel. Besar Trah Wonoikromo'},
        {path:'upt-ntt', name: 'Kel. Besar UPT NTT'},

        {path:'fauzan', name: 'Kel. Bpk. Fauzan'},
        {path:'sofyan-hakim', name: 'Kel. Bpk. Sofyan Hakim'},

        {path:'hari-pramono', name: 'Kel. Bpk. Hari Pramono'},
        {path:'sofyan-hakim', name: 'Kel. Bpk. Sofyan Hakim'},
    ];

    let auth = arr_user.find(a => a.path === loc);
    if(auth?.name){
        $('#auths').html('');
        $('#auths').append(`${auth.name}`);
    } else {
        window.location.href = '/';
    }

    $(document).ready(function() {
        $(".invite_sections").hide();
        window.scrollTo(0, 0);
        // const url = new URL(window.location);
        // url.hash = '';
        // history.replaceState(null, document.title, url);
        // audio.volume = 1;
        // audio.play();
        // played();

    });

    function played() {
        $(".invite_sections").show();
        $(".master_sections").hide();
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
        $(".invite_sections").hide();
        $(".master_sections").show();

        window.scrollTo(0, 0);

    }
</script>
@stop