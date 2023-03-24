@extends('_layouts.index')

@section('content')
    <div class="master_sections">
        <div class="master_sections_layer row text-center justify-content-center">
            <div class="col-lg-12 text_grey">
                Undangan Pernikahan

                <div class="invitor handwriter text_light">
                    Nabila & Irfan
                </div>
            </div>
            <div class="col-lg-12 invitee text_light">
                <div class="dear">Dear : Fauzan</div>
                <a role="button" class="btn btn-sm btn-custom btn-light" href="{{ route('invitePage') }}"
                    onclick="played()">Buka
                    Undangan</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
@stop
