<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTom Map</title>
    <!-- Importa la libreria delle mappe di TomTom -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css">
    <style>
        /* Imposta l'altezza e la larghezza della mappa */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Mappa di </h1>
    <div id="map"></div>

    <script>
        // Inizializza la mappa di TomTom
        var map = tt.map({
            key: '{{ config('services.tomtom.api_key') }}', // Inserisci la tua chiave API di TomTom qui
            container: 'map',
            center: [12.5450, 41.8992], // Coordinata centrale
            zoom: 14 // Livello di zoom
        });

        // Aggiungi un marcatore sulla mappa
        var marker = new tt.Marker()
            .setLngLat([12.5450, 41.8992])
            .addTo(map);
        var marker2 = new tt.Marker()
            .setLngLat([12.492231, 41.890210])
            .addTo(map);
    </script>
</body>
</html>