@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="container-task">
        <h1 class="mb-4">Daftar Tugas Saya</h1>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">➕ Tambah Tugas</a>

        @forelse ($tasks ?? [] as $task)
            <div class="card mb-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $task->title }}</strong>
                        <p class="mb-0 text-muted">{{ $task->description }}</p>
                    </div>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">✏️ Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin hapus tugas ini?')">🗑️ Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Kamu belum memiliki tugas apapun.</p>
        @endforelse

        {{-- @include('components.menu') --}}
    </div>
@endsection
