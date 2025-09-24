@extends('layouts.app')

@section('content')
<h2>Data Kategori</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        @can('kategori_create')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
        @endcan
    </div>

    <div>
        @can('kategori_export')
        <a href="{{ route('export.kategori') }}" class="btn btn-success">📤 Export</a>
        @endcan
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
                @can('kategori_write')
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan

                @can('kategori_delete')
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
