
@extends('admin.master.layouts')
@section("content")

<div class="main-content-container container-fluid px-4 mb-4">
           <!-- Page Header -->
           <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
              <h3 class="page-title">Parkir Terkini</h3>
            </div>
            <div class="col-12 col-sm-4 d-flex align-items-center">
              
              <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
                
                <div class="form-group col-md-5">
                  <label for="displayEmail">Jukir</label>
                  <select class="custom-select" id="jukir" onchange="getInfo()">
                    <option value="All" selected>All</option>
                    @foreach ($jukir as $item)
                    @if (isset($_GET['jukir']))
                      <option value="{{$item->id}}" {{ ($_GET['jukir']==$item->id) ? 'selected' : '' }}>{{$item->UserJukirBiodata->nama}} ({{ $item->username }})</option>
                    @else
                      <option value="{{$item->id}}" >{{$item->UserJukirBiodata->nama}} ({{ $item->username }})</option>
                    @endif
                      
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-5">
                  <label for="displayEmail">Jenis kendaraan</label>
                  <select class="custom-select" id="jenis_kendaraan" onchange="getInfo()">
                    <option value="All" selected>All</option>
                    @foreach ($refbiaya as $i)
                      @if (isset($_GET['jenis_kendaraan']))
                      <option value="{{$i->id_ref_kendaraan}}" {{ ($_GET['jenis_kendaraan']==$i->id_ref_kendaraan) ? 'selected' : '' }}>{{$i->jenis_kendaraan}}</option>
                      @else
                      <option value="{{$i->id_ref_kendaraan}}" >{{$i->jenis_kendaraan}}</option>
                      @endif
                      
                    @endforeach
                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="tgl">Atur Tanggal</label>
                  <input type="date" class="form-control" id="tgl" onchange="getInfo()">
                </div>
                <div class="form-group col-md-6">
                    
                    <label for="displayEmail">Data Parkir Masuk</label>
                        <a href="/admin/datakendaraan/Parkir">
                    <button type="button" class="btn btn-accent">
                      <i class="material-icons">account_circle</i> 
                      Lihat Data
                    </button>
                  </a>
                </div>
              </div>  
            </div>
            {{-- INI SEARCH --}}

            {{-- <div class="col-12 col-sm-4 d-flex align-items-center">
              <div id="analytics-overview-date-range" class="input-daterange input-group input-group-sm ml-auto">
                <input type="search" class="input-sm form-control" name="end" placeholder="Search" id="analytics-overview-date-range-2">
              </div>
            </div> --}}
          </div>
          <!-- End Page Header -->
        <!-- API MAPS -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback&language=id&region=ID"></script>
        {{-- END Maps --}}
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-header border-bottom text-center">
          <div class="mb-3 mx-auto">
            {{-- <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110"> --}}
          </div>
          <span id="namaPemilik"></span>
          <span id="plat" class="text-muted d-block mb-2"></span>
        </div>
        <label for="feLastName">Seri Kendaraan :
          <span id="seri"></span>
        </label>
         <br>
         <label for="feLastName">Merk Kendaraan :
          <span id="merk"></span>
        </label>
         <br>
         <label for="feLastName">Biaya :
          <span id="biaya"></span>
        </label>
         <br>
         <label for="feLastName">Durasi Lama Parkir:
          <span id="durasi"></span>
        </label>
         <br>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
        <body>
          <div id="googleMap" style="width:100%;height:65vh;"></div>
        </body>
  </div>
</div>
 
@endsection
@section('js')
<script>
  var markers = [];
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
    var propertiPeta = {
        center:new google.maps.LatLng(-0.501617,117.126472),
        zoom:10,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    
    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    // membuat Marker
    var i = 0;
    @foreach ($tb_parkir  as $item)
      var latitude = {{$item->lat }};
      var longtitude = {{$item->lng }};
      var myLatLng = {lat:parseFloat(latitude), lng:parseFloat(longtitude)};
      markers[i] = new google.maps.Marker({
        position: myLatLng,
        map : peta
      });
      markers[i].jukir = '{{ $item->UserJukir2->id }}';
      markers[i].jenis = '{{ $item->UserKendaraan->RefJenisKendaraan2->id_ref_kendaraan}}';
      markers[i].addListener('click', function() {
        // plat, namaPemilik, alamatUser, seri, merk, biaya, durasi 
        <?php 
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $date = new DateTime();
          $awal  = strtotime($item->tgl_masuk); //waktu awal
          $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
          $diff  = $akhir - $awal;
          $jam   = floor($diff / (60 * 60));
          $menit = floor(($diff - $jam * (60 * 60))/60);
          $estimasi_biaya = "Rp " . number_format($jam*$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');

          $date = new DateTime($item->tgl_masuk);
          $tgl = $date->format('Y-m-d');
        ?>
        
        var biaya = '<?php echo $estimasi_biaya; ?>';
        var durasi = '<?php echo $jam; ?>';
        var plat = '{{$item->UserKendaraan->noRegistrasi }}';
        var seri = '{{$item->UserKendaraan->seri }}';
        var merk = '{{$item->UserKendaraan->RefMerk1->merk }}';
        var namaPemilik = '{{$item->UserKendaraan->namaPemilik }}';
        var alamatUser = '{{ $item->UserKendaraan->alamat }}';
        $("#biaya").html(biaya);
        $("#durasi").html(durasi+" Jam");
        $("#plat").html(plat);
        $("#seri").html(seri);
        $("#merk").html(merk);
        $("#namaPemilik").html(namaPemilik);
        $("#exampleModal").modal('show');
      });
      markers[i].tgl = '{{ $tgl }}';
      i++;
    @endforeach
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);

    function getInfo(){
      var tgl = $("#tgl").val();
      // alert(tgl);
      var idjukir = $("#jukir").val();
      var jenis_kendaraan = $("#jenis_kendaraan").val();
      var j;
      for (j = 0; j < markers.length; j++) {
        if(tgl == "" ||markers[j].tgl == tgl ){
          if (markers[j].jenis == jenis_kendaraan && markers[j].jukir == idjukir) {
            markers[j].setVisible(true);
          }else{
            markers[j].setVisible(false);
            if(jenis_kendaraan == "All" && idjukir == "All"){
              markers[j].setVisible(true);
            }else{
              if(markers[j].jenis == jenis_kendaraan){
                markers[j].setVisible(true);
                if(markers[j].jukir == idjukir){
                  markers[j].setVisible(true);
                }else{
                  markers[j].setVisible(false);
                  if(idjukir == "All"){
                    markers[j].setVisible(true);
                  }
                  
                }
              }else{
                if(markers[j].jukir == idjukir){
                  if(markers[j].jenis == jenis_kendaraan){
                    markers[j].setVisible(true);
                  }else{
                    if("All" == jenis_kendaraan){
                      markers[j].setVisible(true);
                    }
                  }
                }else{
                  markers[j].setVisible(false);
                }
              }
            }
            
          }

        }else{
          markers[j].setVisible(false);
        }
        
      }
    }
</script>
@endsection