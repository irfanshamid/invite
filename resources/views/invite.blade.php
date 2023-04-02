@extends('_layouts.index')

@section('content')
<div class="master_sections fadeIn">
    <div class="master_sections_layer row text-center justify-content-center">
        <div class="col-lg-12 text_grey">
            Undangan Pernikahan

            <div class="invitor handwriter text_light">
                Nabila & Irfan
            </div>
        </div>
        <div class="col-lg-12 invitee text_light" style="margin-top: -115px;">
            <div class="dear">
                Kepada <br>
                <h6 id="auths" class="font-weight-bold"></h6>
            </div>
            <div class="mb-3 p-2">
                <small>
                    Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir di acara pernikahan kami.
                </small>
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
        {path:'ilham', name: 'Ilham'},
        {path:'wati', name: 'Kel. Wati'},
        {path:'rahman', name: 'Kel. Rahman'},

        {path:'fauzan', name: 'Kel. Bpk. Fauzan'},
        {path:'sofyan-hakim', name: 'Kel. Bpk. Sofyan Hakim'},

        {path:'hari-pramono', name: 'Kel. Bpk. Hari Pramono'},
        {path:'bayu', name: 'Kel. Bpk. Bayu'},
        {path:'bryan', name: 'Kel. Bpk. Bryan'},
        {path:'arie-sadewa', name: 'Kel. Bpk. Ari Sadewa'},
        {path:'edo', name: 'Kel. Bpk. Edo'},
        {path:'rofid', name: 'Kel. Bpk. Rofid'},

        {path:'faishal', name: 'Moch. Faishal'},
        {path:'hilman-maul', name: 'Hilman Maulana'},
        {path:'harryjazz', name: 'Harry Kurniansyah'},
        {path:'hakaman', name: 'Hakaman'},
        {path:'hilmanl', name: 'Hilman Lutfi'},
        {path:'mustafa-widiarto', name: 'Mustafa Widiarto'},
        {path:'sofia', name: 'Sofia'},
        {path:'aldo', name: 'Aldo'},
        {path:'muh-sholeh', name: 'Kel. Bpk. Syihabudin Sholeh'},
        {path:'madhi', name: 'Diyah Madhi'},
        {path:'choir-rmdhn', name: 'Choir Ramadhan'},
        {path:'bambang-wicaksana', name: 'Bambang Wicaksana'},
        {path:'azi-fauzi', name: 'Azi Fauzi'},
        {path:'abib-maula', name: 'Abib Maula'},
        {path:'gusti-sani', name: 'Gusti Sani'},
        {path:'alan-permana', name: 'Alan Permana'},
        {path:'adrian-mul', name: 'Adrian Mulyawan'},
        {path:'savana', name: 'Savana'},
        {path:'avin-yogs', name: 'Avin Yoga'},
        {path:'anas-lombu', name: 'Anas Lombu'},
        {path:'almafazi', name: 'Almafazi'},
        {path:'asdita', name: 'Kel. Bpk. Asdita'},
        {path:'dien-ucik', name: 'Kel. Ibu. Dien Ucik'},
        {path:'danur-lintang', name: 'Danur Lintang'},
        {path:'dzaki', name: 'Dzaki Badawi'},
        {path:'megat', name: 'Irfan Megat'},
        {path:'habib', name: 'Habib'},
        {path:'lutfi-fadholi', name: 'Lutfi Fadholi'},
        {path:'yoga-agung', name: 'Yoga Agung'},
        {path:'ardie', name: 'Kel. Bpk. Ardie'},
        {path:'iqbal', name: 'Iqbal'},
        {path:'rizky-effendi', name: 'Rizky Effendi'},
        {path:'husein', name: 'Kel. Bpk. Husein'},
        {path:'ajopa', name: 'Adam Jordani'},
        {path:'dara', name: 'Dara'},
        {path:'ben-usman', name: 'Benny Usman'},
        {path:'reynald-kay', name: 'Reynald Kay'},
        {path:'saiful', name: 'Saiful Islam'},
        {path:'tadho', name: 'Tadho'},
        {path:'bella', name: 'Bella'},
        {path:'ivan-primananda', name: 'Ivan Primananda'},
        {path:'bella-loaloka', name: 'Bella Loaloka'},
        {path:'liaw', name: 'Lia Weking'},
        {path:'uni-adu', name: 'Murni Adu'},
        {path:'pui-baitanu', name: 'Putri Baitanu'},
        {path:'dinda', name: 'Dinda Siswono'},
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