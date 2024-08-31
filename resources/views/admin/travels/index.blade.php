@extends('layouts.app')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success">{{session()->get('message')}}</div>
@endif

<div class="card-container d-flex container">
    <div class="row justify-content-center">
        @foreach ($travels as $travel)



        <!-- Card My Trips -->
        @include('admin.partials.card-travels')


        @endforeach
    </div>
</div>
@endsection