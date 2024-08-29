@extends('layouts.app')

@section('content')
<section class="container">
    @if (session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
    <section>
       day id:  {{ $day->id}}
    <h2 class="text-center tet-uppercase">Modifica tappa : {{ $stage->name }}</h2>

    <form class="row g-3" action="{{route('admin.travels.days.stages.update', [$travel->id, $day->id, $stage->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{old('name', $stage->name)}}" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="address" class="form-label">address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                name="address" value="{{old('address', $stage->address)}}" required> 

        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{old('description', $stage->description)}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="image" class="form-label">image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

        </div>
        @error('image')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="start_time" class="form-label">start time</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                name="start_time" value="{{old('start_time', $stage->start_time)}}" required>   

        </div>
        @error('start_time')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="end_time" class="form-label">end time</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                name="end_time" value="{{old('end_time', $stage->end_time)}}" required>

        </div>
        @error('end_time')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="rate" class="form-label">rate</label>
            <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate"
                value="{{old('rate', $stage->rate)}}" required>

        </div>  
        @error('rate')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="note" class="form-label">note</label>
            <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note"
                value="{{old('note', $stage->note)}}" required>

        </div>
        @error('note')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        
        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">modifica</button>
        </div>
            
</section>
@endsection
