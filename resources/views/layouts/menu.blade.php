@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    <div class="menu-container">
        <h3 class="menu-title">Daftar Menu</h3>
        <ul class="menu-list">
            @foreach ($menus as $menu)
                <li class="menu-item">
                    <span>{{ $menu->name }}</span>
                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('menu.store') }}" method="POST" class="add-menu-form">
            @csrf
            <input type="text" name="name" placeholder="Nama Menu" class="input-field" required>
            <button type="submit" class="add-button">Tambah Menu</button>
        </form>
    </div>



@endsection
