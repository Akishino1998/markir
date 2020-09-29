
@extends('admin.master.layouts')
@section("content")

<div class="main-content-container container-fluid px-4 mb-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                <h3 class="page-title">Data Jukir</h3>
              </div>
              {{-- <div class="col-12 col-sm-7 d-flex align-items-center">
                <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                  <a href="/datakendaraan" class="btn btn-white active"> Insentif Setiap Juru Parkir</a>
                </div>
              </div> --}}
            </div>
            <!-- End Page Header -->
        <!-- Transaction History Table -->
        <div class="row">
          <div class="col">
            <div class="card card-small mb-4">
              <div class="card-header border-bottom">
                <h6 class="m-0">Active Users</h6>
              </div>
              <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="border-0">No</th>
                      <th scope="col" class="border-0">Username</th>
                      <th scope="col" class="border-0">Nama</th>
                      <th scope="col" class="border-0">No. Hp</th>
                      <th scope="col" class="border-0">No Seri Alat</th>
                      <th scope="col" class="border-0">Status</th>
                      <th scope="col" class="border-0">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($jukir as $j)
                        
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$j->username}}</td>
                      <td>{{$j->UserJukirBiodata->nama}}</td>
                      <td>{{$j->UserJukirBiodata->no_hp}}</td>
                      <td>{{$j->no_seri_alat}}</td>
                      <td>
                        @if ($j->status == "N")
                          <button class="btn btn-danger">Belum Terverifikasi</button>
                        @elseif($j->status == "non")
                          <button class="btn btn-danger">Non Aktif</button>
                        @elseif($j->status == "tolak")
                          <button class="btn btn-danger">Tidak Lolos</button>
                        @else
                          <button class="btn btn-success">Terverifikasi</button>
                        @endif
                      </td>
                      <td>
                        @if ($j->status == "N")
                          <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <button type="button" class="btn btn-warning" onclick="showData({{ $j->id }})">
                              <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Verifikasi
                            </button>
                          </div>
                        @elseif($j->status == "non")
                        <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                          <button type="button" class="btn btn-warning" onclick="showData({{ $j->id }})">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Verifikasi Ulang
                          </button>
                        </div>
                        @elseif($j->status == "tolak")
                          <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <button type="button" class="btn btn-warning" onclick="showData({{ $j->id }})">
                              <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Verifikasi Ulang
                            </button>
                          </div>
                        @else
                          <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <button type="button" class="btn btn-primary" onclick="showJukir({{ $j->id }})">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="nonAktifJukir({{ $j->id }})">
                              <i class="material-icons">delete</i>
                            </button>
                          </div>
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
            <!-- End Transaction History Table -->
  </div>

{{-- MODAL TAMPILAN VERIFIKASI --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Jukir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-small mb-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                  <div class="row">
                    <div class="col">
                      <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="feFirstName">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username " readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="feLastName">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="nama" readonly>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="feEmailAddress">Tanggal Lahir</label>
                            <input type="email" class="form-control" id="email" placeholder="Email"readonly>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="fePassword">No Hp</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="No. Hp" readonly>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-small mb-4">
              <img src="" alt="" id="img-ktp" style="width: 100%;">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-small mb-4">
              <img src="" alt="" id="img-user" style="width: 100%;">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="" id="btnVerikasi"><button class="btn btn-warning" style="float:right;">Verifikasi!</button></a>
        <a href="" id="btnTolak"><button class="btn btn-danger" style="float:right;">Tolak!</button></a>
        <a href="" id="btnAktif"><button class="btn btn-warning" style="float:right;" >Aktifkan Kembali!</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script>
    function showData(id, status = false){
      $("#exampleModal").modal('show');
      fetch('/admin/getInfoJukir/'+id)
        .then(
          function(response){
            response.json().then(function(data){
              $("#username").val(data.UserJukir.username);
              $("#nama").val(data.UserJukirBiodata.nama);
              $("#email").val(data.UserJukirBiodata.email);
              $("#no_hp").val(data.UserJukirBiodata.no_hp);
              $("#img-ktp").attr("src", "{{ asset('foto-ktp-jukir') }}/"+data.UserJukirBiodata.foto_ktp);
              $("#img-user").attr("src", "{{ asset('foto-user-jukir') }}/"+data.UserJukirBiodata.foto);

              if(status){
                $("#btnVerikasi").attr('hidden',true);
                $("#btnTolak").attr('hidden',true);
                $("#btnAktif").attr('hidden',false);
                $("#btnAktif").attr("href", `/admin/userJukir/verifikasi/${data.UserJukir.id}/aktif`);
              }else{
                $("#btnVerikasi").attr("href", `/admin/userJukir/verifikasi/${data.UserJukir.id}/aktif`);
                $("#btnAktif").attr('hidden',true);
                $("#btnVerikasi").attr('hidden',false);
                $("#btnTolak").attr('hidden',false);
                $("#btnTolak").attr("href", `/admin/userJukir/verifikasi/${data.UserJukir.id}/tolak`);
              }
            })
          }
        );
    }
  </script>
   <script>
    function showJukir(id){
      window.location.replace(`/admin/showJukir/${id}`);
    }
    function nonAktifJukir(id){
      window.location.replace(`/admin/deleteJukir/${id}`);
    }
  </script>
@endsection