@extends('layouts.app')

@section('title', 'login')

@section('content')
    <div class="login-blade">
        <div class="btn-req-back">
            <a href="/">BACK</a>
            <a href="/register">REGS</a>
        </div>
        <div class="login-form">
            <h3>Login Here</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Email</label>
                <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" required>

                <button class="login-btn" type="submit">Log In</button>

                <div class="social">
                    <div class="go"><i class="fab fa-google"></i> Google</div>
                    <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
                </div>

            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
