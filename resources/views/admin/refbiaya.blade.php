@extends('admin.master.layouts')
@section('content')

<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <h3 class="page-title">Info Biaya Parkir</h3></h3>
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
                      <form  method="post" action="/admin/refbiaya">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jenis</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Motor atau Mobil" name="jenis_kendaraan" required >

                          @if ($errors -> has('jenis_kendaraan'))
                            <div class="text-danger">
                              {{$errors->first('jenis_kendaraan')}}
                            </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Biaya</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="biaya"  name="biaya_per_jam" required>
                          @if ($errors -> has('biaya_per_jam'))
                            <div class="text-danger">
                              {{$errors->first('biaya_per_jam')}}
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
        <h6 class="m-0">Active Users</h6>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">Model Kendaraan</th>
              <th scope="col" class="border-0">Nominal</th>
              <th scope="col" class="border-0">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($refbiaya as $j)
                
            <tr>
              <td>{{$j->id_ref_kendaraan}}</td>
              <td>{{$j->jenis_kendaraan}}</td>
              <td>{{$j->biaya_per_jam}}</td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                  <a href="/admin/refbiaya/hapus/{{$j->id_ref_kendaraan}}">
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