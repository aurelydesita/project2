@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4" style="color: #f06292; font-family: 'Poppins', sans-serif;">
        🍰 Daftar Menu Makanan Lezat
    </h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        @can('konten_create')
        <a href="{{ route('contents.create') }}"
           class="btn"
           style="background: #ff8fa3; color: white; border-radius: 20px; 
                  box-shadow: 0 3px 6px rgba(0,0,0,0.1); font-weight: 500;">
           + Tambah Makanan 🍽️
        </a>
        @endcan

        @can('konten_export')
        <a href="{{ route('export.konten') }}"
           class="btn"
           style="background: #a3d9a5; color: white; border-radius: 20px; 
                  box-shadow: 0 3px 6px rgba(0,0,0,0.1); font-weight: 500;">
           📤 Export Konten
        </a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table text-center align-middle" 
               style="background-color: white; border-radius: 15px; overflow: hidden;">
            <thead style="background-color: #fff0f4;">
                <tr>
                    <th>No</th>
                    <th>🌸 Nama</th>
                    <th>📂 Kategori</th>
                    <th>🖼️ Gambar</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $index => $content)
                <tr style="vertical-align: middle;">
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-semibold" style="color: #d6336c;">
                        {{ $content->title }}
                    </td>
                    <td>
                        <span class="badge rounded-pill text-bg-light" 
                              style="border: 1px solid #ffccd5;">
                            {{ $content->category->name }}
                        </span>
                    </td>
                    <td>
                        @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}"
                             style="width: 70px; height: 70px; object-fit: cover; border-radius: 12px;"
                             alt="Gambar makanan">
                        @endif
                    </td>
                    <td>
                        @can('konten_write')
                        <a href="{{ route('contents.edit', $content) }}"
                           class="btn btn-sm"
                           style="background-color: #ffd6dc; color: #d6336c; border-radius: 12px;">
                           ✏️ Edit
                        </a>
                        @endcan

                        @can('konten_delete')
                        <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm"
                                    style="background-color: #ffc2c2; color: #721c24; border-radius: 12px;"
                                    onclick="return confirm('Yakin ingin menghapus makanan ini?')">
                                    🗑️ Hapus
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
