@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="home-content">
        <div class="section-profile">
            <a href="/login"><i class='bx bx-user-circle'></i></a>
            <span class="schedule"><a href="/login">Add a schedule <i class='bx bx-plus'></i></a></span>
        </div>
        <div class="content-view">
            <div class="scroller">
                <ul class="text-list">
                    <li>Task: Debugs..</li>
                    <li>Task: Test..</li>
                    <li>Task: Issue</li>
                    <li>Task: 404..</li>
                    <li>Task: Depl..</li>
                </ul>
            </div>
            <img src="{{ asset('assets/Computer.gif') }}" alt="computer-gif">
        </div>
    </div>
@endsection
