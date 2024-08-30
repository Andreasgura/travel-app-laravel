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
    <h1>Mappa giorno {{ $day->day_number }}</h1>
    @foreach ($day->stages as $stage)
        <p>{{ $stage->name }}</p>
    @endforeach
    

    <div id="map"></div>

    <script>
        // Inizializza la mappa di TomTom
        var map = tt.map({
            key: '{{ config('services.tomtom.api_key') }}',
            container: 'map',
            center: [12.5450, 41.8992], // Coordinata centrale
            zoom: 10 // Livello di zoom
        });

        // Crea un marker per ogni stage
        // Pass stages data to JavaScript using a JSON object
        var stages = <?php echo json_encode($day->stages); ?>;
// Loop through stages using JavaScript
stages.forEach(function(stage) {
    var marker = new tt.Marker()
        .setLngLat([stage.long, stage.lat])
        .addTo(map);
    });
    </script>
</body>
</html>