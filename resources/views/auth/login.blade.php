@extends('layouts.app')

@section('title', 'login')

@section('content')
    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="email@example.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>

            <button type="submit" class="button">Masuk</button>

            {{-- <div style="margin-top: 15px;">
            <a href="{{ route('forgot-password') }}" style="color: #007bff;">Lupa Password?</a>
        </div> --}}
        </form>
    </div>
@endsection
