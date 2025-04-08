@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="text-center">
        <h1>Dashboard</h1>
    </div>

    @isset($menus)
        @include('components.menu')
    @else
        <p>Menu belum tersedia.</p>
    @endisset
@endsection
