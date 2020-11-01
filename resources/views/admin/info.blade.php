@extends('admin.master.layouts')
@section('content')

<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Informasi
        </span>
        <h3 class="page-title">Info Merk Kendaraan</h3>
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
                      <form  method="post" action="/admin/info">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputPassword1">Merk Kendaraan</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="merk"  name="merk" required>
                          @if ($errors -> has('merk'))
                            <div class="text-danger">
                              {{$errors->first('merk')}}
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
    <div class="card card-small mb-2">
      <div class="card-header border-bottom">
        
      <div class="card-body">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">Model Kendaraan</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          {{-- DELETE --}}
          <tbody>
            <?php  $i=1; ?>
            @foreach($info as $j)
                
            <tr>
              <td>{{$i++}}</td>
              <td>{{$j->merk}}</td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                    <button type="button" class="btn btn-white" data-toggle="modal" data-target="#exampleModal2{{$j->id_merk}}">
                      <i class="material-icons">edit</i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2{{$j->id_merk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="/admin/info/edit/{{$j->id_merk}}" method="post">
                            @csrf
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Merk Kendaraan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <label for="">Merk</label>
                              <input type="text" class="form-control" name="merk" value="{{$j->merk}}">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                
                  <a href="/admin/info/hapus/{{$j->id_merk}}">
                    <button type="button" class="btn btn-white">
                      <i class="material-icons">delete</i>
                    </button>
                  </a>
                </div>
              </td>
            </tr>
            {{-- END DELETE --}}
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