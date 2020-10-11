@extends('admin.master.layouts')
@section("content")
 <div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Informasi
        </span>
        <h3 class="page-title">Data Seluruh Parkir</h3>
      </div>
    </div>
  <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
    <div class="form-group col-md-6"> 
          <a href="/admin/laporanpdf/Sudah">
            <button type="button" class="btn btn-accent">
              <i class="material-icons">account_circle</i> 
              Export Data
            </button>
          </a>
      </div>
  </div>

      <!-- End Page Header -->
<!-- Transaction History Table -->
<div class="row">
  <div class="col">
    <div class="card card-small mb-2">
      <div class="card-header border-bottom">
        
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">KT Kendaraan</th>
              <th scope="col" class="border-0">Juru Parkir</th>
              <th scope="col" class="border-0">Status pakir</th>
              <th scope="col" class="border-0">Biaya</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($laporan as $p)
                
            <tr> 
              <td>{{$p->id_parkir}}</td>
              <td>{{$p->UserKendaraan->noRegistrasi}}</td>
              <td>{{$p->jukir}}</td>
              <td>{{$p->stat_parkir}}</td>
              <td>{{$p->biaya}}</td>
              <td>
                <a href="/admin/laporanpdf/Sudah">
              <button class="btn btn-success">Export File</button>
                </a>
                <a href="/admin/viewlaporan">
                  <button class="btn btn-success">View Laporan</button>
                    </a>
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