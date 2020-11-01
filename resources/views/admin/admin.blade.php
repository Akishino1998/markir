@extends('admin.master.layouts')
@section('content')
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <h3 class="page-title">Info Akun Admin</h3></h3>
      </div>
      <div class="col-12 col-sm-6 d-flex align-items-center">
        <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
          <div class="container">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#myModal">
              <i class="material-icons">add</i>Tambah data
            </button>
          
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Isi data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="card-body">
                      <form  method="post" action="/admin/tambah">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" required >

                          @if ($errors -> has('username'))
                            <div class="text-danger">
                              {{$errors->first('username')}}
                            </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nama</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama"  name="nama" required>
                          @if ($errors -> has('nama'))
                            <div class="text-danger">
                              {{$errors->first('nama')}}
                            </div>
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password"  name="password" required>
                            @if ($errors -> has('password'))
                              <div class="text-danger">
                                {{$errors->first('password')}}
                              </div>
                            @endif
                          </div>
                          {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Ulangin Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password"  name="password" required>
                            @if ($errors -> has('password'))
                              <div class="text-danger">
                                {{$errors->first('password')}}
                              </div>
                            @endif
                          </div> --}}
                          <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" placeholder=""  name="foto" required>
                            @if ($errors -> has('foto'))
                              <div class="text-danger">
                                {{$errors->first('foto')}}
                              </div>
                            @endif
                          </div>
                        <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Simpan data</button>
                      </form>
                    </div>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>   
        </div>
      </div>
    </div>
    <!-- End Page Header -->
<!-- Transaction History Table -->
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Data Admin</h6>
      <div class="card-body">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">Username</th>
              <th scope="col" class="border-0">Nama</th>
              <th th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($login as $l)
                
            <tr>
              <td>{{$l->id}}</td>
              <td>{{$l->username}}</td>
              <td>{{$l->nama}}</td>
              <td>
             
                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                  <a href="/admin/hapus/{{$l->id}}">
                  <button type="button" class="btn btn-white">
                    <i class="material-icons">delete</i>
                  </button>
                </a>
                </div>
                
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