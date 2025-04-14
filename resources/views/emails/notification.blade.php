@extends('layouts.app')

@section('title', 'Notification')

@section('content')
    <div>
        <h3>Pesan Anda:</h3>
        <p>{{ $customMessage }}</p>
    </div>

@endsection
