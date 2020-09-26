@extends('jukir.layouts.master')
@section('konten')
<style>
    .image-input .image-input-wrapper{
        width: 200px;
        height: 200px;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Informasi Akunku (#{{ $data->id }})</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Sesuaikan dengan data dirimu, ya!</span>
                    </div>
                    <div class="card-toolbar">
                        <button type="reset" class="btn btn-success mr-2">Ubah Dataku</button>
                    </div>
                </div>
                <!--end::Header-->
    
                <!--begin::Form-->
                <form class="form">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Fotoku</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('foto-user-jukir') }}/{{ $data->UserJukirBiodata->foto }})"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $data->UserJukirBiodata->nama }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mt-10 mb-6">Kontakku</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">No. HP</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"  placeholder="Phone" value="{{ $data->UserJukirBiodata->no_hp }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Email" value="{{ $data->UserJukirBiodata->email }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </form>
                
            </div>
        </div>
    </div>
@endsection