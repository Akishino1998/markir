@extends('admin.master.layouts')
@section('content')
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Informasi
        </span>
        <h3 class="page-title">Insentif Setiap jukir</h3>
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
            </tr>
          </thead>
          {{-- DELETE --}}
          <tbody>
            @foreach($datakendaraan as $d)
                
            <tr>
              <td>{{$d->UserKendaraan}}</td>
              <td>{{$d->id_kendaraan}}</td>
              <td>{{$d->jukir}}</td>
              <td>{{$d->stat_parkir}}</td>
              <td>{{$d->biaya}}</td>
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