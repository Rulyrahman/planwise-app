@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="home-content">
        <div class="section-profile">
            <img src="https://i.pravatar.cc/40" alt="User">
            <span class="schedule"><a>Add a schedule</a><i class='bx bx-plus'></i></span>
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
