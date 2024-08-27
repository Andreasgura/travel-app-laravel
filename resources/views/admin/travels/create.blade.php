@extends('layouts.app')

@section('content')
<section class="container">
    <div>crea nuovo viaggio</div>
    <section>
    <h2 class="text-center tet-uppercase">inserisci un nuovo film</h2>

    <form class="row g-3" action="{{route('admin.travels.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{old('title')}}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{old('description')}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-md-6">
            <label for="start_date" class="form-label">start date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                name="start_date" value="{{old('start_date')}}" required>

        </div>
        @error('start_date')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-md-6">
            <label for="end_date" class="form-label">end date</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                name="end_date" value="{{old('end_date')}}" required>

        </div>
        
        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">crea</button>
        </div>

</section>
@endsection