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
        // Pass stages data to JavaScript using a JSON object
        var stages = <?php echo json_encode($day->stages); ?>;
        // Inizializza la mappa di TomTom
        var map = tt.map({
            key: '{{ config('services.tomtom.api_key') }}',
            container: 'map',
            center: [stages[0].long, stages[0].lat], // Coordinata centrale
            zoom: 11 // Livello di zoom
        });

        // Crea un marker per ogni stage
        
// Loop through stages using JavaScript
stages.forEach(function(stage) {
    var marker = new tt.Marker()
        .setLngLat([stage.long, stage.lat])
        .addTo(map);
        // Crea un popup con il nome della tappa
        var popup = new tt.Popup({
            offset: 35 // Offset per evitare che il popup copra il marker
        }).setText(stage.name);

        // Collega il popup al marker
        marker.setPopup(popup);

        // Mostra il popup all'hover del mouse
        marker.getElement().addEventListener('mouseenter', function() {
            marker.togglePopup();
        });

        // Nasconde il popup quando il mouse esce dal marker
        marker.getElement().addEventListener('mouseleave', function() {
            marker.togglePopup();
        });
    });
    </script>
</body>
</html>