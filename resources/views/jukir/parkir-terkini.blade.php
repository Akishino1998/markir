@extends('jukir.layouts.master')
@section('sideBar')
<div class="sidebar-content flex-column-fluid pb-10 pt-9 px-5 px-lg-10" >
    <div class="card card-custom card-shadowless bg-white" id="informasiParkir" hidden>
        <div class="card card-custom" id="kt_card_1">
            <div class="card-header">
                <div class="card-title" id="pemilik">
                    Pilih Kendaraan
                </div>
            </div>
            <div class="card-body">
                <center>
                    <img src="{{ asset('kendaraan/Honda-BeAT-Terbaru-2020-CBS-ISS-Fusion-Magenta-Black-scaled.jpg') }}" alt="" width="100%" id="gambar_kendaraan">
                    <br><br>
                    
                    <button class="btn font-weight-bold btn-light-success mr-2" id="biaya_parkir"> dd </button>
                    <div class="font-size-lg timeline-content text-muted" id="kendaraan">
                        KT 5155I - Honda Beat
                    </div>

                </center>
            </div>
        </div>
    </div>
    <br>
    <div class="card card-custom card-shadowless bg-white">
    <!--begin::Header-->
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="font-weight-bolder text-dark">Parkiran Masuk Hari Ini</span>
            </h3>
        </div>
        <div class="card-body pt-4">
            @if ($data->COUNT() == 0)
            <span class="card-label font-weight-bolder text-dark">Tidak Ada Data</span>
            @endif
            <div class="timeline timeline-6 mt-3">
                @foreach ($data as $item)
                    <div class="timeline-item align-items-start">
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ date('H:i', strtotime($item->tgl_masuk)) }}</div>
                        <div class="timeline-badge">
                            @if ($item->stat_parkir == "Parkir")
                            <i class="fa fa-genderless text-success icon-xl"></i>
                            @else
                            <i class="fa fa-genderless text-danger icon-xl"></i>
                            @endif
                        </div>
                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3 " >
                            <a href="" class="text-primary">{{ $item->UserKendaraan->noRegistrasi }} <br></a> 
                            {{ $item->UserKendaraan->RefMerk1->merk }} {{ $item->UserKendaraan->seri }}
                            
                        </div>
                        <button class="btn btn-primary" onclick="showMarker({{ $item->id_parkir }})">Lihat</button>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>

</div>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div id="googleMap" style="width:100%;height:100vh;"></div>
        </div>
    </div>
@endsection
@section('js')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback&language=id&region=ID"></script>
  <script>
    var peta, marker;
    var markers = [];
  function initialize() {
    var latitude = '-0.501617';
    var longtitude = '117.126472';
    var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
    var propertiPeta = {
      center:myLatLng,
      zoom:15,
      
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    
    peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    showAll();
  }
  function showAll(){
    var latitude, longtitude, myLatLng;
    var i = 0;
    for (var idx = 0; idx < markers.length; idx++) {
      markers[idx].setMap(null);
    }
    @foreach ($data as $item)
        var latitude = {{ $item->lat }};
        var longtitude = {{ $item->lng }};
        var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
        markers[i] = new google.maps.Marker({
          position: myLatLng,
          map: peta,
          label:'{{ $item->UserKendaraan->noRegistrasi }}',
          icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"
        });
        markers[i].addListener('click', function() {
            showMarker({{ $item->id_parkir }});
        });
        peta.setCenter({
          lat : parseFloat(latitude),
          lng : parseFloat(longtitude)
        });
        peta.setZoom(15);
        i++;
    @endforeach
  }
  function showMarker(id){ 
    @foreach ($data as $item)
    
        if(id == {{ $item->id_parkir }}){
            var latitude = {{ $item->lat }};
            var longtitude = {{ $item->lng }};
            var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
            peta.setCenter({
            lat : parseFloat(latitude),
            lng : parseFloat(longtitude)
            });
            peta.setZoom(18);

            <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = new DateTime();
                $awal  = strtotime($item->tgl_masuk); //waktu awal
                $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
                $diff  = $akhir - $awal;
                                    
                $jam   = floor($diff / (60 * 60));
                $menit = floor(($diff - $jam * (60 * 60))/60);
 
                $estimasi_biaya = "Rp " . number_format($jam*$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');
            ?>
            $("#biaya_parkir").html('{{ $estimasi_biaya }}<br>{{ $jam }} Jam, {{ $menit  }} Menit');

            $("#pemilik").html('Pemilik : {{ $item->UserKendaraan->UserAkun->UserBiodata->nama }}');
            $("#kendaraan").html('{{ $item->UserKendaraan->noRegistrasi }} - {{ $item->UserKendaraan->RefMerk1->merk }} {{ $item->UserKendaraan->seri }}');
            $('#informasiParkir').removeAttr('hidden');

        }
      
    @endforeach  
  }
  // event jendela di-load  
  google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script>

  </script>
@endsection