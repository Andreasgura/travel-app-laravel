@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($days as $day)
            <li>{{ $day->day_number }}</li>
            <li>{{ $day->description }}</li>
        @endforeach
    </ul>

@endsection