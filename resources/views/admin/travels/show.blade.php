@extends('layouts.app')

@section('content')

<section class="container">
    <h1> {{ $travel->name }}</h1>
    <p>Numero di giorni: {{ $travel->days->count() }}</p>
    <p> Descrizione viaggio: {{ $travel->description }}</p>
    <p> Data inizio viaggio: {{ $travel->start_date }}</p>
    <p> Data fine viaggio:{{ $travel->end_date }}</p>
    
    
    @foreach ($travel->days as $day)
    <p>Giornata {{ $day->day_number }}: {{ $day->description }}</p>
    @endforeach
    

<div class="btn">
    <a href="{{ route('admin.days.create', $travel->id) }}">Aggiungi una nuova giornata</a>
</div>
</section>




@endsection