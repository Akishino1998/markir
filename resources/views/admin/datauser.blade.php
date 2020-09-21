@extends('admin.master.layouts')
@section("content")
<div class="main-content-container container-fluid px-4">
    <div class="row">
      <div class="col-lg-8 mx-auto mt-4">
        <!-- Edit User Details Card -->
        <div class="card card-small edit-user-details mb-4">
          <div class="card-header p-0">
          </div>
          <div class="card-body p-0">
            <div class="border-bottom clearfix d-flex">
              <ul class="nav nav-tabs border-0 mt-auto mx-4 pt-2">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Biodata User</a>
                </li>
              </ul>
            </div>
            <form action="/admin/datauser" method="post" class="py-4">
              <div class="form-row mx-4">
                <div class="col mb-3">
                  <h6 class="form-text m-0">biodata User</h6>
                  <p class="form-text text-muted m-0">biodata yang telah di input oleh calon jukir</p>
                </div>
              </div>
              <div class="form-row mx-4">
                <div class="col-lg-12">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" value="{{ $userbiodata->username }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nama">nama</label>
                      <input type="text" class="form-control" id="nama" value="{{ $userbiodata->nama }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="no_hp">Tanggal Lahir</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="material-icons">&#xE0CD;</i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="tgl_lahir" value="{{ $userbiodata->tgl_lahir }}" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_hp">Nomor Telepon</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0CD;</i>
                            </div>
                          </div>
                          <input type="text" class="form-control" id="no_hp" value="{{ $userbiodata->no_hp }}" readonly>
                        </div>
                      </div>
                    <div class="form-group col-md-6">
                      <label for="emailAddress">Email</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="material-icons">&#xE0BE;</i>
                          </div>
                        </div>
                        <input type="email" class="form-control" id="email" value="{{ $userbiodata->email }}" readonly>
                      </div>
                    </div>

                    
                  </div>
                </div>
                <div class="col-lg-12">
                  <label for="userProfilePicture" class="text-center w-100 mb-4">Profile Picture</label>
                  <img src="/foto-user-jukir/{{ $userbiodata->foto }}" alt="User Avatar" width="100%">
                  <br>
                  <label for="userProfilePicture" class="text-center w-100 mb-4">Foto KTP</label>
                  <img src="/foto-user-jukir/{{ $userbiodata->foto_ktp }}" alt="User Avatar" width="100%">
                </div>
              </div>
              <div class="card-footer border-top">
                @if ($userbiodata->status == "N")
                  <input type="submit" class="btn btn-sm btn-success ml-auto d-table mr-3" value="Verifikasi"/>
                @endif
              </div>
              @csrf
            </form>
        <!-- End Edit User Details Card -->
    </div>
  </div>

@endsection