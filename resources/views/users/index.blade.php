@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4" style="color: #f06292; font-family: 'Poppins', sans-serif;">
        👥 Daftar User Aplikasi
    </h2>

    <div class="text-center mb-3">
        <a href="{{ route('users.create') }}"
           class="btn"
           style="background: #ff8fa3; color: white; border-radius: 20px; box-shadow: 0 3px 6px rgba(0,0,0,0.1); font-weight: 500;">
           + Tambah User 🌸
        </a>
    </div>

    <div class="table-responsive">
        <table class="table text-center align-middle" style="background-color: white; border-radius: 15px; overflow: hidden;">
            <thead style="background-color: #fff0f4;">
                <tr>
                    <th>No</th>
                    <th>👤 Nama</th>
                    <th>📧 Email</th>
                    <th>🎭 Role</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr style="vertical-align: middle;">
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-semibold" style="color: #d6336c;">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge rounded-pill text-bg-light" style="border: 1px solid #ffccd5;">
                                {{ ucfirst($role->name) }}
                            </span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('users.permissions.edit', $user->id) }}"
                           class="btn btn-sm"
                           style="background-color: #ffd6dc; color: #d6336c; border-radius: 12px;">
                           ✏️ Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm"
                                    style="background-color: #ffc2c2; color: #721c24; border-radius: 12px;"
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Tombol Kembali ke Dashboard -->
@auth
<div class="text-center mt-5">
    <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
       class="btn px-4 py-2 rounded-pill shadow-sm"
       style="background-color:#d6336c ; color:white;">
        🏠 Kembali ke Dashboard
    </a>
</div>
@endauth
@endsection
