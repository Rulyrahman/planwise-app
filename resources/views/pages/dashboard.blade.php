@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="text-center">
        <h1>Dashboard</h1>
    </div>

    @include('tasks.index')

@endsection
