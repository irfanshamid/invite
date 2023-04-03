<div class="section_part invite_rsvp" id="rsvp">
  <div class="invite_rsvp_sections_layer row justify-content-center px-4 align-items-baseline">
    <div class="col-lg-12 text_light reveal">
      <h2 class="mb-3 font-weight-bold">RSVP</h2>
      <div class="mb-4">
        Diharapkan tamu undangan untuk <br>
        mengisi konfirmasi kehadiran di bawah ini
      </div>

      <form data-action="{{ route('rsvp') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
        @csrf
        <input type="text" name="path" id="path_name_field" class="d-none" />
        <input type="int" name="rsvp" id="rsvp_field" value="1" class="d-none" />
        <div class="rsvp_form row justify-content-center">
          <div class="form-inline mx-2">
            <input type="radio" name="conf" class="mr-2" id="radio1" @if ($rsvp_data==1) checked="checked" @endif>
            <label class="m-0">Hadir</label>
          </div>
          <div class="form-inline mx-2">
            <input type="radio" name="conf" class="mr-2" id="radio0" @if ($rsvp_data==0) checked="checked" @endif>
            <label class="m-0">Tidak Hadir</label>
          </div>
        </div>
        <button class="btn btn-custom btn-sm w-100">Konfirmasi</button>
      </form>
    </div>
  </div>
</div>