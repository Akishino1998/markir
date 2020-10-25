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
                <div class="form-group col-md-8">
                  <label for="displayEmail">Jenis kendaraan</label>
                  <select class="custom-select" id="jenis_kendaraan" onchange="getInfoParkir()">
                    <option value="0" selected>All</option>
                    @foreach ($refbiaya as $i)
                      @if (isset($_GET['jenis_kendaraan']))
                      <option value="{{$i->id_ref_kendaraan}}" {{ ($_GET['jenis_kendaraan']==$i->id_ref_kendaraan) ? 'selected' : '' }}>{{$i->jenis_kendaraan}}</option>
                      @else
                      <option value="{{$i->id_ref_kendaraan}}" >{{$i->jenis_kendaraan}}</option>
                      @endif
                      
                    @endforeach
                    
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 d-flex align-items-center">
              {{-- <div id="analytics-overview-date-range" class="input-daterange input-group input-group-sm ml-auto">
                <input type="search" class="input-sm form-control" name="end" placeholder="Search" id="analytics-overview-date-range-2">
              </div> --}}
            </div>
          </div>
          <!-- End Page Header -->
        <!-- Transaction History Table -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback&language=id&region=ID"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="plat"></span> <br>
        <span id="namaPemilik"></span> <br>
        <span id="seri"></span> <br>
        <span id="merk"></span> <br>
        <span id="biaya"></span> <br>
        <span id="durasi"></span> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <script>
          var markers;
            // fungsi initialize untuk mempersiapkan peta
            function initialize() {
            var propertiPeta = {
                center:new google.maps.LatLng(-0.501617,117.126472),
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            
            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
            // membuat Marker
            @foreach ($parkirmasuk  as $item)
            @if(isset($_GET['jenis_kendaraan']))
                @if($_GET['jenis_kendaraan'] == "0")
                    var latitude = {{$item->lat }};
                    var longtitude = {{$item->lng }};
                    var myLatLng = {lat:parseFloat(latitude), lng:parseFloat(longtitude)};
                    markers = new google.maps.Marker({
                      position: myLatLng,
                      map : peta
                    });
                    markers.addListener('click', function() {
                        // plat, namaPemilik, alamatUser, seri, merk, biaya, durasi 
                        <?php 
                        date_default_timezone_set("Asia/Kuala_Lumpur");
                        $date = new DateTime();
                        $awal  = strtotime($item->tgl_masuk); //waktu awal
                        $akhir = strtotime($item->tgl_keluar); //waktu akhir
                        $diff  = $akhir - $awal;
                                     
                        $jam   = floor($diff / (60 * 60));
                        $menit = floor(($diff - $jam * (60 * 60))/60);

                        $estimasi_biaya = "Rp " . number_format($jam*$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');
                      ?>
                        var biaya = '<?php echo $estimasi_biaya; ?>';
                        var durasi = '<?php echo $jam; ?> Jam, <?php echo $menit; ?> Menit ';
                        var plat = '{{$item->UserKendaraan->noRegistrasi }}';
                        var seri = '{{$item->UserKendaraan->seri }}';
                        var merk = '{{$item->UserKendaraan->RefMerk1->merk }}';
                        var namaPemilik = '{{$item->UserKendaraan->namaPemilik }}';
                        var alamatUser = '{{ $item->UserKendaraan->UserAkun->UserBiodata->alamat }}';
                        $("#biaya").html(biaya);
                        $("#durasi").html(durasi );
                        $("#plat").html(plat);
                        $("#seri").html(seri);
                        $("#merk").html(merk);
                        $("#namaPemilik").html(namaPemilik);
                        $("#exampleModal").modal('show');
                    });
                @else
                  @if($item->UserKendaraan->RefJenisKendaraan1->id_ref_kendaraan == $_GET['jenis_kendaraan'])
                    var latitude = {{$item->lat }};
                    var longtitude = {{$item->lng }};
                    var myLatLng = {lat:parseFloat(latitude), lng:parseFloat(longtitude)};
                    markers = new google.maps.Marker({
                      position: myLatLng,
                      map : peta
                    });
                    markers.addListener('click', function() {
                        // plat, namaPemilik, alamatUser, seri, merk, biaya, durasi 
                        <?php 
                        date_default_timezone_set("Asia/Kuala_Lumpur");
                        $date = new DateTime();
                        $awal  = strtotime($item->tgl_masuk); //waktu awal
                            $akhir = strtotime($item->tgl_keluar); //waktu akhir
                        $diff  = $akhir - $awal;
                                     
                        $jam   = floor($diff / (60 * 60));
                        $menit = floor(($diff - $jam * (60 * 60))/60);

                        $estimasi_biaya = "Rp " . number_format($jam*$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');
                      ?>
                        var biaya = '<?php echo $estimasi_biaya; ?>';
                        var durasi = '<?php echo $jam; ?> Jam, <?php echo $menit; ?> Menit ';
                        var plat = '{{$item->UserKendaraan->noRegistrasi }}';
                        var seri = '{{$item->UserKendaraan->seri }}';
                        var merk = '{{$item->UserKendaraan->RefMerk1->merk }}';
                        var namaPemilik = '{{$item->UserKendaraan->namaPemilik }}';
                        var alamatUser = '{{ $item->UserKendaraan->UserAkun->UserBiodata->alamat }}';
                        $("#biaya").html(biaya);
                        $("#durasi").html(durasi );
                        $("#plat").html(plat);
                        $("#seri").html(seri);
                        $("#merk").html(merk);
                        $("#namaPemilik").html(namaPemilik);
                        $("#exampleModal").modal('show');
                    });
                  @endif
                @endif
              @else
                   var latitude = {{$item->lat }};
                   var longtitude = {{$item->lng }};
                   var myLatLng = {lat:parseFloat(latitude), lng:parseFloat(longtitude)};
                   markers = new google.maps.Marker({
                     position: myLatLng,
                     map : peta
                   });
                   markers.addListener('click', function() {
                      // plat, namaPemilik, alamatUser, seri, merk, biaya, durasi 
                        <?php 
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                            $date = new DateTime();
                            $awal  = strtotime($item->tgl_masuk); //waktu awal
                            $akhir = strtotime($item->tgl_keluar); //waktu akhir
                            $diff  = $akhir - $awal;
                                                
                            $jam   = floor($diff / (60 * 60));
                            $menit = floor(($diff - $jam * (60 * 60))/60);
            
                            $estimasi_biaya = "Rp " . number_format($jam*$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam+$item->UserKendaraan->RefJenisKendaraan1->biaya_per_jam,2,',','.');
                        ?>
                        var biaya = '<?php echo $estimasi_biaya; ?>';
                        var durasi = '<?php echo $jam; ?> Jam, <?php echo $menit; ?> Menit ';
                        var plat = '{{$item->UserKendaraan->noRegistrasi }}';
                        var seri = '{{$item->UserKendaraan->seri }}';
                        var merk = '{{$item->UserKendaraan->RefMerk1->merk }}';
                        var namaPemilik = '{{$item->UserKendaraan->namaPemilik }}';
                        var alamatUser = '{{ $item->UserKendaraan->UserAkun->UserBiodata->alamat }}';
                        $("#biaya").html(biaya);
                        $("#durasi").html(durasi );
                        $("#plat").html(plat);
                        $("#seri").html(seri);
                        $("#merk").html(merk);
                        $("#namaPemilik").html(namaPemilik);
                        $("#exampleModal").modal('show');
                   });
              @endif
            @endforeach
            }
            // event jendela di-load  
            google.maps.event.addDomListener(window, 'load', initialize);
      </script>
        <body>
          <div id="googleMap" style="width:100%;height:65vh;"></div>
        </body>
      </div>
  <script>
    function getInfoParkir(){
      var jenis_kendaraan = $("#jenis_kendaraan").val();
      window.location.replace('/admin/showJukir/{{ $username }}?jenis_kendaraan='+jenis_kendaraan);
    }

  </script>
@endsection