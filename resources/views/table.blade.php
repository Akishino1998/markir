<?php 
if(isset($_GET['id_alat'])){
  ?>
  <!DOCTYPE html>
  <html>
    <style>
      /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
  #map {
    height: 100%;
  }
  
  /* Optional: Makes the sample page fill the window. */
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
    </style>
    <head>
      <form action="/getLokasi" method="get">
        <input type="text" id="id_alat" name="id_alat" value="{{ $_GET['id_alat'] }}">
        <button type="submit">SET ID ALAT</button>
      </form>
      
      <title>Geolocation</title>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
      {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> --}}
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap&libraries=&v=weekly"
        defer
      ></script>
      {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback&language=id&region=ID"></script> --}}
      <!-- jsFiddle will insert css and js -->
    </head>
    <body>
      <div id="map"></div>
    </body>
  </html>
  <script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  let map, infoWindow;
  var lat,lng;
  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 6,
    });
    infoWindow = new google.maps.InfoWindow();
  
    // Try HTML5 geolocation.
    
  }
  
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }
  function getLokasi(){
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          if(lat != position.coords.latitude){

            id_alat = $("#id_alat").val();
            lat = position.coords.latitude;
            lng = position.coords.longitude;
            $.get("/jukir/setLokasiAlat/"+id_alat+"/"+lat+"/"+lng, function(data){
              console.log("Status: " + data);
            });
            console.log("/setLokasiAlat/"+id_alat+"/"+lat+"/"+lng);
          }
          
          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
    
  }
  // $(document).everyTime(1000, load);
  window.setInterval(getLokasi, 1000);
  
  </script>
  <?php
}else{
  ?>
    <form action="/getLokasi" method="get">
      <input type="text" name="id_alat">
      <button type="submit">SET ID ALAT</button>
    </form>
  <?php
}
?>