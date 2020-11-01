@extends('admin.master.layouts')
@section("content")

<div class="main-content-container container-fluid px-4 mb-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                <h3 class="page-title">Info User Akun</h3>
              </div>  
            </div>
            <!-- End Page Header -->
        <!-- Transaction History Table -->
        <div class="row">
          <div class="col">
            <div class="card card-small mb-4">
              <div class="card-header border-bottom">
                <h6 class="m-0">Active Users</h6>
              </div>
              <div class="card-body">
                <table class="table mb-0">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="border-0">No</th>
                      <th scope="col" class="border-0">Username</th>
                      <th scope="col" class="border-0">Nama</th>
                      <th scope="col" class="border-0">Status</th>
                      <th scope="col" class="border-0">Detail user</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $i=1; ?>
                    
                    @foreach($userAkun as $u)
                        
                    <tr>
                      
                      <td>{{$i++}}</td>
                      <td>{{$u->username}}</td>
                      <td>{{$u->UserBiodata->nama}}</td>
                      <td>
                        @if ($u->status == "N")
                          <button class="btn btn-danger">Belum Terverifikasi</button>
                        @else
                          <button class="btn btn-success">Terverifikasi</button>
                        @endif
                      </td>
                      <td>
                          @if ($u->status == "N")
                            <div class="container">
                              <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal1{{ $u->id }}" id="btn1" >
                                  <i class="material-icons">account_box</i>
                                </button>
                              <!-- The Modal -->
                              <div class="modal fade" id="myModal1{{ $u->id }}">
                                <div class="modal-dialog ">
                                  <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Biodata User</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <body>
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
                                                            <input type="text" class="form-control" id="username" placeholder="Username " value="{{ $u->username }}">
                                                          </div>
                                                          <div class="form-group col-md-6">
                                                            <label for="feLastName">Nama</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="nama"  value="{{ $u->UserBiodata->nama }}">
                                                          </div>
                                                        </div>
                                                        <div class="form-row">
                                                          <div class="form-group col-md-6">
                                                            <label for="feEmailAddress">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" value="{{ $u->UserBiodata->tgl_lahir }}">
                                                          </div>
                                                          <div class="form-group col-md-6">
                                                            <label for="fePassword">No Hp</label>
                                                            <input type="text" class="form-control" id="no_hp" placeholder="No Hp" value="{{ $u->UserBiodata->no_hp }}">
                                                          </div>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="card card-small mb-4">
                                              <img src="{{ asset('profile') }}/{{ $u->UserBiodata->foto }}" width="100%">
                                            </div>
                                          </div>
                                          <div class="col-lg-12">
                                            <div class="card card-small mb-6">
                                              <img src="{{ asset('profile') }}/{{ $u->UserBiodata->ktp }}" width="100%">
                                            </div>
                                          </div>
                                        </div>
                                      
                                      </body>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <a href="/admin/userbiodata/verifikasi/{{ $u->id }}/aktif"><button class="btn btn-warning" style="float:right;">Verifikasi!</button></a>
                                      <a href="/admin/userbiodata/verifikasi/{{ $u->id }}/tolak"><button class="btn btn-danger" style="float:right;">Tolak!</button></a>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    {{-- END MODAL MAPS --}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          @else
                            <div class="container">
                              <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal2{{ $u->id }}" id="btn1" onclick="getuser('{{$u->username}}')">
                                  <i class="material-icons">account_box</i>
                                </button>
                              <!-- The Modal -->
                              <div class="modal fade" id="myModal2{{ $u->id }}">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Maps Kendaraan</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <body>
                                        <div class="row">
                                          <div class="col-lg-4">
                                            <div class="card card-small mb-4 pt-3">
                                              <div class="card-header border-bottom text-center">
                                                <div class="mb-3 mx-auto">
                                                  <img class="rounded-circle" src="{{ asset('profile') }}/{{ $u->UserBiodata->foto }}" alt="User Avatar" width="110">
                                                </div>
                                              </div>
                                              <p class="text-center text-light  mb-2">Lihat Kendaraan User</p>
                                              <a href="/admin/infokendaraan/{{$u->id}}">
                                                <button class="btn btn-warning"> {{ $userKendaraan->where('username',$u->id)->where('status','N')->COUNT() }} Kendaraan belum dicek</button>
                                              </a>
                                              <br>
                                              <a href="/admin/infouser/{{$u->id}}">
                                                <button type="button" class="btn btn-accent">
                                                  Lihat Kendaraan
                                                </button>
                                              </a>
                                              <br>
                                            
                                            </div>
                                          </div>
                                          <div class="col-lg-8">
                                            <div class="card card-small mb-4">
                                              <div class="card-header border-bottom">
                                                <h6 class="m-0">User Biodata</h6>
                                              </div>
                                              <ul class="list-group list-group-flush">
                                                <li class="list-group-item p-3">
                                                  <div class="row">
                                                    <div class="col">
                                                      <form>
                                                        <div class="form-row">
                                                          <div class="form-group col-md-6">
                                                            <label for="feFirstName">Username</label>
                                                            <input type="text" class="form-control" id="username" placeholder="Username " value="{{ $u->username }}">
                                                          </div>
                                                          <div class="form-group col-md-6">
                                                            <label for="feLastName">Nama</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="nama"  value="{{ $u->UserBiodata->nama }}">
                                                          </div>
                                                        </div>
                                                        <div class="form-row">
                                                          <div class="form-group col-md-6">
                                                            <label for="feEmailAddress">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" value="{{ $u->UserBiodata->tgl_lahir }}">
                                                          </div>
                                                          <div class="form-group col-md-6">
                                                            <label for="fePassword">No Hp</label>
                                                            <input type="text" class="form-control" id="no_hp" placeholder="No Hp" value="{{ $u->UserBiodata->no_hp }}">
                                                          </div>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                      
                                      </body>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    {{-- END MODAL MAPS --}}
                                  </div>
                                </div>
                              </div>
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
@endsection
<script>

</script>