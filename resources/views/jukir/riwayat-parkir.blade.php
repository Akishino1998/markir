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
                    
                    <button class="btn font-weight-bold btn-light-success mr-2" id="biaya_parkir">  </button>
                    <div class="font-size-lg timeline-content text-muted" id="kendaraan">
                    
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
                <span class="font-weight-bolder text-dark">Riwayat Parkiranmu Hari Ini</span>
            </h3>
        </div>
        <div class="card-body pt-4">
            @if ($data->COUNT() == 0)
            <span class="card-label font-weight-bolder text-dark">Tidak Ada Data</span>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <input type="search" class="form-control" placeholder="Cari Plat" id="plat">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary mr-2" onclick="searchPlat()">Submit</button>
                </div>
            </div>
            <div class="timeline timeline-6 mt-3">
                
                @foreach ($data as $item)
                    <div class="timeline-item align-items-start">
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ date('H:i', strtotime($item->tgl_masuk)) }}<br>{{ date('d M', strtotime($item->tgl_masuk)) }}</div>
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
        <div class="card card-custom d-flex justify-content-center">
            <div class="card-body py-7">
                <center>{{ $data->links() }}</center>
            </div>
        </div>

    </div>
    

</div>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class=" mb-10">
                <h3 class="d-block text-dark font-weight-bolder">Perhasilkanku {{ (isset($_GET['tgl']))?$_GET['tgl']:'Hari Ini' }} : Rp. <span id="totalBiaya"></span> <a href="#" class="btn font-weight-bold btn-light-primary" data-toggle="modal" data-target="#kt_datepicker_modal">Lihat Lain Hari</a></h3>
                
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-custom gutter-b ">
                <div class="card-header h-auto border-0">
                    <div class="card-title py-5">
                        <ul class="nav nav-success nav-pills" id="myTab2" role="tablist">
                            <li class="nav-item" onclick="displayMarkers('All')">
                                <a class="nav-link active" id="home-tab-2" data-toggle="tab" href="#home-2">
                                    <span class="nav-text">All</span>
                                </a>
                            </li>
                            @foreach ($jenis as $item)
                                <li class="nav-item" onclick="displayMarkers({{ $item->id_ref_kendaraan }})">
                                    <a class="nav-link" id="contact-tab-2" data-toggle="tab" href="#contact-2" aria-controls="contact">
                                        <span class="nav-text"> {{ $item->jenis_kendaraan }} </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul> 
                    </div>
                    <div class="card-toolbar">
                        <span class="d-block text-dark font-weight-bolder">Tampilkan :</span> 
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
                            <li class="nav-item" onclick="showMarkerParkir(10)">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_1">
                                    <span class="nav-text font-size-sm">10</span>
                                </a>
                            </li>
                            <li class="nav-item" onclick="showMarkerParkir(20)">
                                <a class="nav-link py-2 px-4 " data-toggle="tab" href="#kt_charts_widget_2_chart_tab_2">
                                    <span class="nav-text font-size-sm">20</span>
                                </a>
                            </li>
                            <li class="nav-item" onclick="showMarkerParkir({{ $data2->COUNT() }})">
                                <a class="nav-link py-2 px-4 " data-toggle="tab" href="#kt_charts_widget_2_chart_tab_3">
                                    <span class="nav-text font-size-sm">Semua ({{ $data2->COUNT() }})</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="googleMap" style="width:100%;height:100vh;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_datepicker_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mau Liat Data Tanggal Berapa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form class="form" method="GET" accept="/jukir/riwayat-parkir">
                    
                    <div class="modal-body">
                        <div class="form-group row">
                            {{-- <label class="col-form-label text-right col-lg-3 col-sm-12">Minimum Setup</label> --}}
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input name="tgl" type="text" class="form-control" id="kt_datepicker_1_modal" readonly placeholder="Select date"/>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endsection
@section('js')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback&language=id&region=ID"></script>
  <script>
      var d = new Date($.now());
    var peta, marker;
    var markers = [];
    var kategori = "All";
    var jumlahTitik = 10;
function searchPlat(){
    var j;
    var plat = $("#plat").val().toUpperCase();
    
    for (j = 0; j < markers.length; j++) {

        var noRegistrasi = markers[j].plat;
        if(noRegistrasi.search(plat) >= 0){
            markers[j].setVisible(true);
            showMarker(markers[j].id);
            
            break;
        }
    }
}
function showMarkerParkir(titik){
    jumlahTitik = titik;
    var j;
    for (j = 0; j < markers.length; j++) {
        if( j < titik ) {
            if(kategori == "All"){
                markers[j].setVisible(true);
            }else{
                if(kategori == markers[j].category){
                    markers[j].setVisible(true);
                }else{
                    markers[j].setVisible(false);
                    titik++;
                }
            }
        }else{
            markers[j].setVisible(false);
        }
        // alert(titik);
    }
}
function displayMarkers(category) {
    var i;
    kategori = category;
    for (i = 0; i < markers.length; i++) {
        if(markers[i].category == category ) {
            markers[i].setVisible(true);
        }else if(category == "All"){
            markers[i].setVisible(true);
        }
        else {
        markers[i].setVisible(false);
        }
    }
    showMarkerParkir(jumlahTitik);
}
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
    var biaya = 0;
    @foreach ($data2 as $item)
        biaya += {{ $item->biaya_parkir }};
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
        markers[i].category = '{{ $item->UserKendaraan->jenis_kendaraan }}';
        markers[i].setVisible(true);
        markers[i].plat='{{ $item->UserKendaraan->noRegistrasi }}';
        markers[i].id='{{ $item->id_parkir }}';
        peta.setCenter({
          lat : parseFloat(latitude),
          lng : parseFloat(longtitude)
        });
        peta.setZoom(15); 
        i++;
    @endforeach

    $("#totalBiaya").html(biaya);
    showMarkerParkir(jumlahTitik);
  }
  function showMarker(id){ 
    @foreach ($data2 as $item)
    
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
                $akhir = strtotime($item->tgl_keluar); //waktu akhir
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
  google.maps.event.addDomListener(window, 'load', initialize);
  
  </script>
  <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
  <script>

var KTBootstrapDatepicker = function () {

	var arrows;
	if (KTUtil.isRTL()) {
		arrows = {
			leftArrow: '<i class="la la-angle-right"></i>',
			rightArrow: '<i class="la la-angle-left"></i>'
		}
	} else {
		arrows = {
			leftArrow: '<i class="la la-angle-left"></i>',
			rightArrow: '<i class="la la-angle-right"></i>'
		}
	}

	// Private functions
	var demos = function () {
		// minimum setup
		$('#kt_datepicker_1').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});

		// minimum setup for modal demo
		$('#kt_datepicker_1_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});


		// input group layout for modal demo
		$('#kt_datepicker_2_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});


		// enable clear button for modal demo
		$('#kt_datepicker_3_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayBtn: "linked",
			clearBtn: true,
			todayHighlight: true,
			templates: arrows
		});
	}

	return {
		// public functions
		init: function() {
			demos();
		}
	};
}();

jQuery(document).ready(function() {
	KTBootstrapDatepicker.init();
});</script>
@endsection