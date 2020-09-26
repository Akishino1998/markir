@extends('jukir.layouts.master')


@section('konten')
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Data Kendaraan Parkir Hari ini
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    @if ($parkir->COUNT() == 0)
                        <span class="card-label font-weight-bolder text-dark">Tidak Ada Data</span>
                    @else
                    <div id="chart_11" class="d-flex justify-content-center"></div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sideBar')
<div class="sidebar-content flex-column-fluid pb-10 pt-9 px-5 px-lg-10">
    <div class="card card-custom card-shadowless bg-white">
    <!--begin::Header-->
        <div class="card-header align-items-center border-0 mt-4">
            <h3 class="card-title align-items-start flex-column">
                <span class="font-weight-bolder text-dark">Parkiran Masuk Hari Ini</span>
            </h3>
        </div>
        <div class="card-body pt-4">
            @if ($parkir->COUNT() == 0)
                <span class="card-label font-weight-bolder text-dark">Tidak Ada Data</span>
            @endif
            <div class="timeline timeline-6 mt-3">
                @foreach ($parkir as $item)
                    <div class="timeline-item align-items-start">
                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ date('H:i', strtotime($item->tgl_masuk)) }}</div>
                        <div class="timeline-badge">
                            @if ($item->stat_parkir == "Parkir")
                            <i class="fa fa-genderless text-success icon-xl"></i>
                            @else
                            <i class="fa fa-genderless text-danger icon-xl"></i>
                            @endif
                        </div>
                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                            {{ $item->UserKendaraan->noRegistrasi }} <br> 
                            {{ $item->UserKendaraan->RefMerk1->merk }} {{ $item->UserKendaraan->seri }}
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{{-- <script src="{{ asset('dist/assets/js/pages/features/charts/apexcharts.js') }}"></script> --}}
<script>
    var series = [];
    var labels = [];
</script>
@foreach ($dataJenis as $item)
    <script>
        var i  = <?php echo $item['total']; ?>;
        series.push(i);
        labels.push("{{ $item['jenis'] }}");
    </script>
@endforeach
<script>
    
    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';
    const apexChart = "#chart_11";
		var options = {
            series: series,
            
			chart: {
				width: 500,
				type: 'donut',
			},
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
                    },
					legend: {
						position: 'bottom'
					}
				}
			}],
            labels: labels
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
</script>
@endsection