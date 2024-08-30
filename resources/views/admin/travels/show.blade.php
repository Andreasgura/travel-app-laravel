@extends('layouts.app')

@section('content')


<section class="container">
@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <h1> {{ $travel->name }}</h1>
    <p>Numero di giorni: {{ $travel->days->count() }}</p>
    <p> Descrizione viaggio: {{ $travel->description }}</p>
    <p> Data inizio viaggio: {{ $travel->start_date }}</p>
    <p> Data fine viaggio:{{ $travel->end_date }}</p>


    @foreach ($travel->days as $day)
    <div>
        <p>Giornata {{ $day->day_number }}: {{ $day->description }}</p>
        <div class="btn">
            <a href="{{ route('admin.days.edit', [$travel->id, $day->id]) }}">Modifica</a>
        </div>
        
        @foreach ($day->stages as $stage)
        <div>
            <a href="{{ route('admin.travels.days.stages.show', [$travel->id, $day->id, $stage->id]) }}">
            <p>Tappa {{ $stage->name }}</p>
        </div>

        <p>Descrizione tappa: {{ $stage->description }}</p>
        
        @endforeach

        <div class="btn">
            <a href="{{ route('admin.maps.show', $day->id) }}">Visualizza mappa</a>
        </div>

        <div class="btn">
            <form action="{{ route('admin.days.destroy', [$travel->id, $day->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Elimina</button>
            </form>
        </div>
        <div class="btn">
            <a href="{{ route('admin.travels.days.stages.create', [$travel->id, $day->id]) }}">Aggiungi una nuova tappa</a>
        </div>
    </div>
    @endforeach


    <div class="btn">
        <a href="{{ route('admin.days.create', $travel->id) }}">Aggiungi una nuova giornata</a>
    </div>
    <!-- <div class="btn">
        <a href="{{ route('admin.maps.show', $travel->id) }}">Visualizza mappa</a>
    </div> -->
</section>




@endsection