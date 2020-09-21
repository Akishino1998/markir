@extends('admin.master.layouts')
@section("content")

<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <h3 class="page-title">validasi jukir</h3>
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
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">Username</th>
              <th scope="col" class="border-0">Nama</th>
              <th scope="col" class="border-0">Status</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($validasi as $v)
                
            <tr>
              <td>{{$v->id}}</td>
              <td>{{$v->username}}</td>
              <td>{{$v->nama}}</td>
              <td>
                
               
              </td>
              <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                    <a href="/admin/datavalidasi">
                    <button type="button" class="btn btn-white" aria-placeholder="kon">
                      <i class="material-icons">edit</i>
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