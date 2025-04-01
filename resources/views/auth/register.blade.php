@extends('layouts.app')

@section('title', 'register')

@section('content')
    <div class="register-blade">
        <div class="btn-req-back">
            <a href="/">BACK</a>
            <a href="/login">LOGIN</a>
        </div>
        <div class="register-form">
            <h3>Register Here</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name">Name</label>
                <input type="text" placeholder="Full Name" id="name" name="name" value="{{ old('name') }}"
                    required>

                <label for="email">Email</label>
                <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}"
                    required>

                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" required>

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" id="password_confirmation"
                    name="password_confirmation" required>

                <button class="register-btn" type="submit">Register</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
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
