<div class="card my-trip col-md-6 m-4 ">
    <div class="d-flex justify-content-between">
        <h3 class="card-title"><a href="{{ route('admin.travels.show', $travel) }}">{{ $travel->name }}</a></h3>
        <span class="trip-icon">✈️</span>

    </div>
    <ul class="trip-list">
        <li class="trip-item">
            <div class="trip-details">
                <span class="trip-title">Periodo</span>
                <br>
                <span class="trip-dates">{{ $travel->start_date }} - {{ $travel->end_date }}</span>
            </div>
        </li>
        <li class="trip-item">
            <div class="trip-details">
                <span class="trip-title">Descrizione del viaggio</span>
                <span class="trip-dates">{{ $travel->description }}</span>
            </div>
        </li>

    </ul>

</div>