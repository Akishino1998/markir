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
                        <h3 class="card-label font-weight-bolder text-dark">Informasi Akunku (#{{ $data->no_seri_alat }})</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Sesuaikan dengan data dirimu, ya!</span>
                    </div>
                </div>
                <!--end::Header-->
    
                <!--begin::Form-->
                <form class="form" method="post" action="/jukir/update-profile" enctype="multipart/form-data" >
                    <!--begin::Body-->
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Fotoku</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('foto-user-jukir') }}/{{ $data->UserJukirBiodata->foto }})"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" accept=".png, .jpg, .jpeg" name="foto">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $data->UserJukirBiodata->nama }}" name="nama">
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
                                    <input type="text" class="form-control form-control-lg form-control-solid"  placeholder="Phone" value="{{ $data->UserJukirBiodata->no_hp }}" name="no_hp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Email" value="{{ $data->UserJukirBiodata->email }}" name="email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar" style="float:right;">
                        <button type="submit" class="btn btn-success mr-2">Simpan Dataku</button>
                    </div>
                    <!--end::Body-->
                    @csrf
                </form>
                
                
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('dist/assets/js/pages/widgets.js') }}"></script>
<script src="{{ asset('dist/assets/js/pages/custom/profile/profile.js') }}"></script>
@endsection