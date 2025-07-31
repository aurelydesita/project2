@extends('layouts.app')

@section('content')
<h2>Edit Data Makanan</h2>
<form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label class="form-label">Nama Makanan</label>
        <input type="text" name="title" class="form-control" value="{{ $content->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi Makanan</label>
        <textarea name="body" class="form-control" rows="5" required>{{ $content->body }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori Makanan</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $content->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Ganti Foto Makanan</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Makanan</button>
</form>
@endsection
