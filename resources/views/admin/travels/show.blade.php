@extends('layouts.app')

@section('content')

    
   {{ $travel->name }}
        <div class="btn">
        <a href="{{ route('admin.days.create', $travel->id) }}">Aggiungi una nuova giornata</a>
    </div>
     
    
    

@endsection