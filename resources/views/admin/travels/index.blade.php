@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($travels as $travel)
            <li>
                <a href="{{ route('admin.travels.show', $travel) }}">{{ $travel->name }}</a>
            </li>
        @endforeach
    </ul>

@endsection