@extends('_layouts.index')

@section('content')
<div class="sections" style="min-height:100vh;">
  <div class="row justify-content-center p-3">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header font-weight-bold">
          Data Invitee
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-striped table-borderless" id="scd-adm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Url Name</th>
                  <th>Rsvp</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $list as $key => $data )
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$data->path}}</td>
                  <td>
                    @if ($data->rsvp == 1)
                    <div class="badge badge-success">Hadir</div>
                    @else
                    <div class="badge badge-danger">Tidak Hadir</div>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@stop