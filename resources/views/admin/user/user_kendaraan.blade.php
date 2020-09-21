@extends('admin.master.layouts')
@section('content')
<div class="main-content-container container-fluid px-4 mb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Informasi
        </span>
        <h3 class="page-title">Kendaraan User {{ $user->UserBiodata->nama }}</h3>
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
              <th scope="col" class="border-0">No. Plat</th>
              <th scope="col" class="border-0">Nama Pemilik</th>
              <th scope="col" class="border-0">Merk</th>
              <th scope="col" class="border-0">Type</th>
              <th scope="col" class="border-0">Model</th>
              <th scope="col" class="border-0">Warna</th>
              <th scope="col" class="border-0">Tahun Pembuatan</th>
              <th scope="col" class="border-0">Foto</th>
              <th scope="col" class="border-0"> Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kendaraan as $d)
                
            <tr>
                <td>{{ $d->id_kendaraan }}</td>
                <td>{{ $d->noRegistrasi }}</td>
                <td>{{ $d->namaPemilik }}</td>
                <td>{{ $d->RefMerk1->merk }}</td>
                <td>{{ $d->seri }}</td>
                <td>{{ $d->RefModelKendaraan2->model }}</td>
                <td>{{ $d->warna }}</td>
                <td>{{ $d->tahunPembuatan }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-success" onclick="showImg('{{ $d->foto }}','{{ $d->fotostnk }}')"><i class="fa fa-file-image-o" aria-hidden="true"></i></button>
                    </div>
                </td>
                <td>
                    @if ($d->status == "N")
                    <div class="btn-group btn-group-sm">
                        <a href="/admin/infokendaraan/verifikasi/{{ $d->id_kendaraan }}/aktif"><button class="btn btn-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Terima</button></a>
                        <a href="/admin/infokendaraan/verifikasi/{{ $d->id_kendaraan }}/tolak"><button class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Tolak</button></a>
                        
                    </div>
                    @elseif ($d->status == "tolak")
                        <button class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tidak Lolos</button>
                    @else
                    <button class="btn btn-success"><i class="fa fa-smile-o" aria-hidden="true"></i> Aktif</button>
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{{-- modal foto --}}
</div>
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
              <h6>Foto Kendaraan</h6>
            <img src="" alt="" id="foto" height="300">
            <h6>Foto STNK</h6>
            <img src="" alt="" id="stnk" height="300">
          </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div> 
@endsection
@section('js')
    <script>
        function showImg(foto, stnk){
            var fotoKendaraan = $("#foto");
            fotoKendaraan.attr("src", "{{ asset('kendaraan') }}/"+foto);

            var fotoKendaraan = $("#stnk");
            fotoKendaraan.attr("src", "{{ asset('stnk') }}/"+stnk);
            $("#exampleModal").modal('show')
        }
    </script>
@endsection