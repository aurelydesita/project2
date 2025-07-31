@extends('layouts.app')

@section('content')
<h2>Data Kategori</h2>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>
<table class="table table-bordered">
    <thead><tr><th>No</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">@csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
