@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <ul>
        @foreach ($travels as $travel)
            <li>
                <a href="{{ route('admin.travels.show', $travel) }}">{{ $travel->name }}</a>
            </li>
        @endforeach
    </ul>

@endsection