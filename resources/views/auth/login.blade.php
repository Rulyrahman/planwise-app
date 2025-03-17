@extends('layouts.app')

@section('title', 'login')

@section('content')
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="login-form">
        <h3>Login Here</h3>
        @csrf
        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">

        <button>Log In</button>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </div>
@endsection
