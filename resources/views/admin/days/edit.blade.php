@extends('layouts.app')

@section('content')
<section class="container">
    <section>
       trsvel id:  {{ $travel->id}}
    <h2 class="text-center tet-uppercase">modifica giorno: {{ $day->day_number }}</h2>

    <form class="row g-3" action="{{route('admin.days.update', [$travel->id, $day->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="travel_id" value="{{ $travel->id }}">
        <div class="col-md-6">
            <label for="day_number" class="form-label">day_number</label>
            <input type="text" class="form-control @error('day_number') is-invalid @enderror" id="day_number" name="day_number"
                value="{{old('day_number', $day->day_number)}}" required>
        </div>
        @error('day_number')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{old('description', $day->description)}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        
        
        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">modifica</button>
        </div>

</section>
@endsection