@extends('layouts.app')

@section('content')


<section class="container">
@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <h1> {{ $stage->name }}</h1>
    <p>Descrizione tappa: {{ $stage->description }}</p>
    <p> Indirizzo: {{ $stage->address }}</p>
    <p> Ora inizio: {{ $stage->start_time }}</p>
    <p> Ora fine: {{ $stage->end_time }}</p>
    <p> Note: {{ $stage->note }}</p>
    <p> Immagine: {{ $stage->image }}</p>
    <p> Voto: {{ $stage->rate }}</p>

<div class="d-flex align-items-center gap-4">
    <a href="{{ route('admin.travels.days.stages.edit', [$travel-> id, $day->id, $stage->id]) }}" class="btn btn-primary">Modifica</a>
    <form action="{{ route('admin.travels.days.stages.destroy', [$travel-> id, $day->id, $stage->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>
</div>
</section>




@endsection