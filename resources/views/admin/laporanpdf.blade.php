<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Markir</title>
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
      </head>
    
<body>
    <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">No</th>
              <th scope="col" class="border-0">KT Kendaraan</th>
              <th scope="col" class="border-0">Juru Parkir</th>
              <th scope="col" class="border-0">Status pakir</th>
              <th scope="col" class="border-0">Biaya</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($laporanpdf as $p)
                
            <tr> 
              <td>{{$p->id_parkir}}</td>
              <td>{{$p->UserKendaraan->noRegistrasi}}</td>
              <td>{{$p->jukir}}</td>
              <td>{{$p->stat_parkir}}</td>
              <td>{{$p->biaya}}</td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
      </div>
</body>
</html>