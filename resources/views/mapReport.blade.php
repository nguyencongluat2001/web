<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Leaflet Set View Example</title>
    <link
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      rel="stylesheet"
    />
    <link href="style.css" rel="stylesheet" />
    <style>
      body {
        padding: 0;
        margin: 0;
      }
      html,
      body,
      #map {
        height: 100%;
        width: 100%;
      }

    </style>
  </head>
  <body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="script.js"></script>
    <script>
      var map = L.map("map").setView([20.983909, 105.848300], 12);
      L.marker([20.983909, 105.848300]).addTo(map);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
    </script>
  </body>
</html>
