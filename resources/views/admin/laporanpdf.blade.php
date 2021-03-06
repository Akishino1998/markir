<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Markir</title>
    <style>
      .body {
            position: relative;
            width: 21cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            color: #001028;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 12px; 
            font-family: Arial;
          }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>Laporan Parkir</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">KT Kendaraan</th>
            <th> Juru Parkir</th>
            <th>Status Parkir</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach($laporanpdf as $p)
              
          <tr> 
            <td class="service">{{$p->id_parkir}}</td>
            <td class="desc">{{$p->UserKendaraan->noRegistrasi}}</td>
            <td class="unit">{{$p->jukir}}</td>
            <td class="qty">{{$p->stat_parkir}}</td>
            <td class="total">{{$p->biaya}}</td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>Skripsi:</div>
        <div class="notice">Sistem Informasi Manajemen Parkir Pada Sistem Parkir Otomatis Berbasis Web</div>
      </div>
    </main>
    <footer>
      Mari Parkir
    </footer>
  </body>

</html>