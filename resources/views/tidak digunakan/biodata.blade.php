@extends('layouts.master')

@section('content')
<div class="main-content-container container-fluid px-4">
    <div class="row">
      <div class="col-lg-8 mx-auto mt-4">
        <!-- Edit User Details Card -->
        <div class="card card-small edit-user-details mb-4">
          <input type="text" name="username" value="{{ $data->username }}" hidden>
          <div class="card-body p-0">
            <div class="py-4">
              <div class="form-row mx-4">
                <div class="col mb-3">
                  <h6 class="form-text m-0">Biodata Anda ({{ $data->username }} - {{ $data->no_seri_alat }})</h6>
                  <p class="form-text text-muted m-0"></p>
                </div>
              </div>
              <div class="form-row mx-4">
                <div class="col-lg-8">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama">Nama</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="nama" value="{{ $data->UserJukirBiodata->nama }}" name="nama" disabled>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="phoneNumber">Phone Number</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="number" class="form-control" id="phoneNumber" value="{{ $data->UserJukirBiodata->no_hp }}" name="no_hp"disabled>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="emailAddress">Email</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input type="email" class="form-control" id="emailAddress" value="{{ $data->UserJukirBiodata->email }}" name="email"disabled>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for="userProfilePicture" class="text-center w-100 mb-4"> </label>
                  <div class="edit-user-details__avatar m-auto">
                    <img id="foto" src="{{ asset('foto-user-jukir/') }}/{{ $data->UserJukirBiodata->foto }}" alt="User Avatar" style="height:100%;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer border-top">
            <a href="/edit-biodata">
              <button class="btn btn-sm btn-accent ml-auto d-table mr-3">Edit</button>
            </a>
          </div>
          @csrf
        </div>
        <!-- End Edit User Details Card -->
      </div>
    </div>
  </div>
@endsection
@section('js')

<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#foto').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#userProfilePicture").change(function() {
  readURL(this);
});
</script>
@endsection