<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <div id="map"></div>
    <script>
      var map;
      var position={lat: 13.847860, lng: 100.604274};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center:position,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.TERRAIN
        });
        var marker = new google.maps.Marker({
          positon:position,
          map:map,
        });
        var info = new google.maps.InfoWindow({
          content : '<div style="font-size: 15px;"> New Studio</div>'
        });
        google.maps.event.addListener(marker, 'click', function(){
          info.open(map, marker);
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGtmgnpOrjz8G8c-zpkFQi63k-1fpqEsU&callback=initMap"
    async defer></script>
  </body>
</html>