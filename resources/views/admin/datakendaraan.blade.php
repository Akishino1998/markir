@extends('admin.master.layouts')
@section('content')
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Informasi
        </span>
        <h3 class="page-title">Data Seluruh Parkir</h3>
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
              <th scope="col" class="border-0">KT Kendaraan</th>
              <th scope="col" class="border-0">Jenis Kendaraan</th>
              <th scope="col" class="border-0">Juru Parkir</th>
              <th scope="col" class="border-0">Biaya</th>
            </tr>
          </thead>
          
          <tbody>
            <?php  $i=1; ?>
            @foreach($datakendaraan as $d)
                
            <tr> 
              <td>{{$i++}}</td>
              
              <td>{{$d->UserKendaraan->noRegistrasi}}</td>
              <td>{{$d->UserKendaraan->RefJenisKendaraan2->jenis_kendaraan}}</td>
              <td>{{$d->UserJukir2->UserJukirBiodata->nama}}</td>
              <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = new DateTime();
                $awal  = strtotime($d->tgl_masuk); //waktu awal
                if ($d->stat_parkir == "Sudah") {
                  $akhir = strtotime($d->tgl_keluar); //waktu akhir
                }else{
                  $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
                }
                $diff  = $akhir - $awal;
                                    
                $jam   = floor($diff / (60 * 60));
                $menit = floor(($diff - $jam * (60 * 60))/60);

                $estimasi_biaya = "Rp " . number_format($jam*$d->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$d->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');
              ?>
              <td>{{$estimasi_biaya}}</td> 
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