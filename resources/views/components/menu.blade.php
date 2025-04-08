@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    <div class="menu-container">
        <h1>Daftar Menu</h1>

        <ul>
            @forelse ($menus ?? [] as $menu)
                <li>
                    {{ $menu->name }}
                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </li>
            @empty
                <li>Tidak ada menu.</li>
            @endforelse
        </ul>

        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Menu" required>
            <button type="submit">Tambah Menu</button>
        </form>
    </div>

@endsection
