@extends('admin.master.layouts')
@section('content')
    
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <h3 class="page-title">Info Model Kendaraan</h3>
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
                      <form  method="post" action="/admin/refmodel">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">No model</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No" name="id_model" required >

                          @if ($errors -> has('id_model'))
                            <div class="text-danger">
                              {{$errors->first('id_model')}}
                            </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Model</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="merk"  name="model" required>
                          @if ($errors -> has('model'))
                            <div class="text-danger">
                              {{$errors->first('model')}}
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
        <h6 class="m-0">Info Biaya Kendaraan</h6>
      <div class="card-body">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">Model Kendaraan</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php  $i=1; ?>
            @foreach($refmodel as $j)  
            <tr>
              <td>{{$i++}}</td>
              <td>{{$j->model}}</td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                  <a href="/admin/ref_model/hapus/{{$j->id_model}}">
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