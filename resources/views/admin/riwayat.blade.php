@extends('admin.master.layouts')
@section('content')
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <h3 class="page-title">Riwayat Parkir Masuk Kerndaraan</h3>
      </div>
      <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex align-items-center">
        <div id="transaction-history-date-range" class="input-daterange input-group input-group-sm ml-auto">
          <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="analytics-overview-date-range-1">
          <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="analytics-overview-date-range-2">
          <span class="input-group-append">
            <span class="input-group-text">
              <i class="material-icons">&#xE916;</i>
            </span>
          </span>
        </div>
      </div>
    </div>
    <!-- End Page Header -->
</div>    
@endsection