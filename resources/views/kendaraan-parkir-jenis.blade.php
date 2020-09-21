@extends('layouts.master')

<style>
.card-body{
  padding : 0px;
}

</style>
@section('content')
<div class="main-content-container container-fluid px-4">
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
      <span class="text-uppercase page-subtitle"></span>
      <h3 class="page-title">Parkir Terkini</h3>
    </div>
    <div class="col-12 col-sm-4 d-flex align-items-center">
      <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
        <a href="/parkir-terkini" class="btn btn-white"> All  </a>
        @foreach ($jenis as $item)
          @if ($id == $item->id_ref_kendaraan)
            <a href="/parkir-terkini/jenis/{{ $item->id_ref_kendaraan }}" class="btn btn-white active"> {{ $item->jenis_kendaraan }}  </a>
          @else
            <a href="/parkir-terkini/jenis/{{ $item->id_ref_kendaraan }}"class="btn btn-white "> {{ $item->jenis_kendaraan }} </a>
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-12 col-sm-4 " >
      <button  onclick="showAll()" data-toggle="modal" data-target="#modalminimaps" style="float:right;" class="btn btn-primary"><i class="fa fa-map fa-2x" aria-hidden="true"></i></button>
    </div>
    
  </div>
  <div class="row">
    <?php $i = 0; ?>
    @foreach ($data as $item)
      @if ($item->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan == $id)
        @if (!in_array($item->id_parkir_masuk,$dataParkir))
          
      
        <?php $i++; ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card card-small card-post mb-4">                  
            <div class="card-body">
            <button  onclick="showMarker({{ $item->id_parkir_masuk }})" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalminimaps"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
              <h5 class="card-title">{{ $item->UserKendaraan->noRegistrasi }}</h5>
              <img src="{{ asset('kendaraan/') }}/{{ $item->UserKendaraan->foto }}" alt="" style="max-width:10vw;">
              <p class="card-text"> {{ $item->UserKendaraan->RefMerk1->merk }} - {{ $item->UserKendaraan->seri }}</p>
            </div>
            <div class="card-footer border-top d-flex">
              <div class="card-post__author d-flex">
                <div class="d-flex flex-column justify-content-center ml-3">
                  <span class="card-post__author-name">{{ $item->UserKendaraan->namaPemilik }}</span>
                  <small class="text-muted">{{ $item->UserKendaraan->RefJenisKendaraan1->jenis_kendaraan }} - {{ $item->UserKendaraan->RefModelKendaraan1->model }}</small>
                </div>
              </div>
              <div class="my-auto ml-auto">
                <button class="btn btn-sm btn-warning" href="parkir-terkini.php?q=1">
                  <i class="fa fa-product-hunt" aria-hidden="true"></i> Terpakir 
                </button>
              </div>
            </div>
          </div>
        </div>  
        @endif
      @endif
    @endforeach  
    <?php 
    if($i == 0){
      echo " <h1>Data Parkir Tidak Ada.</h1>";
    }
    ?>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modalminimaps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div id="googleMap" style="width:100%;height:80vh;"></div>
    </div>
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
  }
  function showMarker(id){
    @foreach ($data as $item)
      if(id == {{ $item->id_parkir_masuk }}){
          var latitude = {{ $item->lat }};
        var longtitude = {{ $item->lng }};
        var plat = '{{ $item->UserKendaraan->noRegistrasi }}';
        var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
        peta.setCenter({
          lat : parseFloat(latitude),
          lng : parseFloat(longtitude)
        });
        peta.setZoom(18);
        for (var idx = 0; idx < markers.length; idx++) {
          markers[idx].setMap(null);
        }
        markers[0] = new google.maps.Marker({
            position: myLatLng,
            map: peta,
            label: plat,
            icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"
        });
      }
      
    @endforeach  
  }
  function showAll(){
    var latitude, longtitude, myLatLng;
    var i = 0;
    for (var idx = 0; idx < markers.length; idx++) {
      markers[idx].setMap(null);
    }
    @foreach ($data as $item)
      @if (!in_array($item->id_parkir_masuk,$dataParkir))
        @if ($item->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan == $id)
          var latitude = {{ $item->lat }};
          var longtitude = {{ $item->lng }};
          var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
          markers[i] = new google.maps.Marker({
            position: myLatLng,
            map: peta,
            label:'{{ $item->UserKendaraan->noRegistrasi }}',
            icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"
          });
          peta.setCenter({
            lat : parseFloat(latitude),
            lng : parseFloat(longtitude)
          });
          peta.setZoom(15);
          i++;
        @endif
      @endif
    @endforeach
    i=0;
  }
  // event jendela di-load  
  google.maps.event.addDomListener(window, 'load', initialize);
  </script>
@endsection