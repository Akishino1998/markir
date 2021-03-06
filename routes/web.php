<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::post('riwayat/date','RiwayatParkirController@showDate');
Route::post('riwayat/date/{id}','RiwayatParkirController@showDateJenis');

Route::get('/', function(){
    return redirect("/user");
});
Route::get('/getLokasi', function(){
    return view('table');
});
Route::get('/create-password/{password}', function($password){
    return password_hash ($password, PASSWORD_DEFAULT );
});

Route::get("/setParkir","APIParkirController@setParkir");
Route::post("/setParkir","APIParkirController@index2"); 
Route::get("/s/{no_alat}/{id_rfid}/{lat}/{lng}","APIParkirController@serParkirIoT");
Route::get("/setLokasi/{idAlat}/{lat}/{lng}","APIParkirController@lokasiKendaraan");
Route::get("/setParkirIoT/{no_alat}/{id_rfid}/{lat}/{lng}","APIParkirController@serParkirIoT");

 
Route::prefix('jukir')->group(function () {
    Route::get('/login', 'AuthController@index');
    Route::post('/login', 'AuthController@login');
    Route::post("/daftar",'DaftarController@store');
    Route::post("/checkUsernameUser",'DaftarController@checkUsernameUser');
    Route::get("/masukkan-seri-alat/{id}","AuthController@masukkan_seri_alat");
    Route::post("/masukkan-seri-alat/{id}","AuthController@Setmasukkan_seri_alat");

    Route::get('/profile','AuthController@showBiodata');
    Route::get('/edit-profile','AuthController@editBiodata');
    Route::POST('/update-profile','AuthController@update');

    Route::get('/jukir', function () {
        return redirect('/dasboard');
    });  
    Route::get('/logout',function(){
        session()->flush();
        return redirect("/jukir/login");
    });
    
    Route::get('/','DasboardController@index');

    Route::get('/parkir-terkini','KendaraanController@index');
    Route::get('/parkir-terkini/jenis/{id}','KendaraanController@showJenis');

    Route::get('/riwayat-parkir','RiwayatParkirController@index');
    Route::get('/riwayat-parkir/full','RiwayatParkirController@showAll');
    Route::get('/setLokasiAlat/{alat}/{lat}/{lng}','APIParkirController@setLokasiAlat');

});
Route::get('/Admin', function () {
    return redirect("/admin/home");
});
Route::get('/user', function () {
    return redirect("/User");
});
Route::prefix('admin')->group(function () {
    Route::get('/logout',function(){
        session()->flush();
        return redirect("/admin/login");
    }); 
    Route::get('/', function () {
        return redirect("/admin/home");
    });

    Route::get("/home", "HomeController@home");

    Route::get("/login", "LoginController@index");
    Route::post("/login", "LoginController@getdata");

    // UNTUK PARKIR KELUAR
    Route::get("/parkirkeluar", "ParkirmkeluarController@index");

    // UNTUK PARKIR MASUK
    Route::get("/parkirmasuk", "ParkirmasukController@index");

    // UNTUK PARKIR JUKIR
    Route::get("/jukir", "JukirController@index");
    Route::get("/deleteJukir/{username}", "JukirController@hapus");
    Route::get("/editJukir/{username}", "JukirController@edit");
    Route::post("/editJukir", "JukirController@simpan");
    Route::get("/showJukir/{username}", "JukirController@showJukir");
    Route::get("/getInfoJukir/{id}","JukirController@getInfoJukir");
    Route::get("/userJukir/verifikasi/{id}/{status}","JukirController@setStatus");
    Route::get("/jukirEditNoSeri/{no_seri}/{id}","JukirController@editNoSeri");
    // UNTUK MENAMPILAN DATA USER
    Route::get("/userbiodata", "UserBiodataController@index");

    // UNTUK DATA VALIDASI USER 
    Route::get('userbiodata/verifikasi/{id}/{status}','UserBiodataController@verifikasi');

    //UNTUK VALIDASI KENDARAAN USER
    Route::get("/infokendaraan/verifikasi/{id}/{status}",'UserBiodataController@verifikasiKendaraan');

    //UNTUK MENAMPILKAN KENDARAAN PER USER
    Route::get("/infokendaraan/{username}",'UserBiodataController@kendaraan');

    // UNTUK PARKIR REF BIAYA
    Route::get("/refbiaya", "RefbiayaController@index");
    Route::get("/refbiaya/hapus/{id_ref_kendaraan}", "RefbiayaController@hapus");
    Route::post("/refbiaya/edit/{id_ref_kendaraan}", "RefbiayaController@edit");
    Route::post("/refbiaya", "RefbiayaController@store");

    // UNTUK PARKIR INFO
    Route::get("/info", "InfoController@index");
    Route::get("/info/hapus/{id_merk}", "InfoController@hapus");
    Route::post("/info/edit/{id}","InfoController@edit");
    route::post("/info","InfoController@store");

    // UNTUK PARKIR REF MODEL
    Route::get("/refmodel", "RefmodelController@index");
    Route::get("/ref_model/hapus/{id_model}", "RefmodelController@hapus");
    route::post("/refmodel","RefmodelController@store");

    // UNTUK PARKIR INFO USER
    // Route::get("/infouser", "InfouserController@infouser");
    Route::get("/infouser", "InfouserController@index");
    Route::get("/infouser/{username}", "InfouserController@showdata");

    // Data Validasi
    Route::get("/datavalidasi", "DatavalidasiController@datavalidasi");

    // Data Kendaraan
    // Route::get("/datakendaraan", "DatakendaraanController@datakendaraan");
    Route::get("/datakendaraan/{status}", "DataKendaraanController@index");

    // Data Admin
    // Route::get("/admin", "AdminController@index");
    Route::get("/admin", "AdminController@admin");
    Route::get("/hapus/{id}", "AdminController@hapus");
    route::post("/tambah","AdminController@store");

    // LAPORAN
    // Route::get("/laporan","LaporanController@index");
    Route::get("/laporan/{status}","LaporanController@laporan");
    Route::get("/laporanpdf/{status}","LaporanController@laporanpdf");



    Route::get("/viewlaporan","LaporanpdfController@viewlaporan");
    Route::get("/viewlaporan","LaporanpdfController@laporanpdf");
});