@extends('layouts.app')

@section('title', 'Create')

@section('content')
<div class="container">
    <h2>Buat Tugas Baru</h2>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
