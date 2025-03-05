@extends('layouts.app')

@section('title', 'register')

@section('content')
    <div class="login-container">
        <div class="login-header">
            <h2>LOGIN</h2>
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf 
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Register</button>
        </form>
        
    </div>
@endsection
