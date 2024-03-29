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
                Kepada Bapak/Ibu/Saudara/i<br>
                <h2 id="auths" class="handwriter"></h2>
            </div>
            <div class="mb-3">
                <small>
                    Tanpa mengurangi rasa hormat, kami mengundang anda <br> untuk hadir di acara pernikahan kami.
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
    let loc = window.location.pathname.replace('/inv/','').replaceAll('-',' ');
    let words = loc.split(" ");
    
    let p = true
    let op = false
    const audio = document.querySelector("audio");
    
    for (let i = 0; i < words.length; i++) {
        words[i] = words[i][0].toUpperCase() + words[i].substr(1);
    }

    let pr = words.join(" ");
    $('#auths').html('');
    $('#auths').append(pr);


    $(document).ready(function() {
        $(".invite_sections").hide();
        window.scrollTo(0, 0);

        var form = '#add-user-form';

        $('#path_name_field').val(loc);
        $('input[type=radio][name=conf]').change(function() {
            let val = $(this).siblings().text()
            if(val === 'Hadir'){
                $('#rsvp_field').val(1);
            } else {
                $('#rsvp_field').val(0);
            }
        });

        $(form).on('submit', function(event){
            event.preventDefault();
            var url = $(this).attr('data-action');
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {
                    $(form).trigger("reset");
                    toastr.success('Terimakasih untuk konfirmasinya')
                    $('#path_name_field').val(loc);
                    $(`#radio${response.data.rsvp}`).attr("checked", true);
                },
                error: function(response) {
                }
            });
        });
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