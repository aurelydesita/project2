@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4 fw-bold" style="color: #f06292; font-family: 'Poppins', sans-serif;">
        🔑 Kelola Hak Akses <br> 
        <span style="color:#d6336c;">{{ $user->name }}</span>
    </h2>

    <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Roles -->
        <div class="mb-4 p-4 shadow-sm rounded-3" style="background: #fff8fa;">
            <h5 class="fw-semibold mb-3" style="color:#ff6f91;">🎭 Pilih Roles</h5>
            <div class="row g-2">
                @foreach($roles as $role)
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check d-flex align-items-center justify-content-center gap-2 p-2 rounded-3"
                             style="background:#ffe5ec; border:1px solid #ffd6dc; min-height:45px; font-size:14px; transition:0.3s;">
                            <input class="form-check-input" type="checkbox" name="roles[]"
                                   value="{{ $role->name }}"
                                   {{ $user->roles->contains('name',$role->name) ? 'checked' : '' }}
                                   style="accent-color:#ff6f91;">
                            <label class="form-check-label fw-medium" style="color:#d6336c; margin:0;">
                                {{ ucfirst($role->name) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Permissions -->
        <div class="p-4 shadow-sm rounded-3" style="background: #fff8fa;">
            <h5 class="fw-semibold mb-3" style="color:#ff6f91;">📋 Permissions</h5>
            <div class="table-responsive">
                <table class="table text-center align-middle mb-0" style="background:white; border-radius:15px; overflow:hidden;">
                    <thead style="background-color:#fff0f4; color:#d6336c;">
                        <tr>
                            <th>📂 Module</th>
                            <th>👀 Read</th>
                            <th>✍️ Write</th>
                            <th>➕ Create</th>
                            <th>🗑️ Delete</th>
                            <th>📤 Export</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $modules = ['kategori','konten','user'];
                            $actions = ['read','write','create','delete','export'];
                        @endphp
                        @foreach($modules as $module)
                        <tr style="transition:0.3s;" onmouseover="this.style.background='#fff5f7'" onmouseout="this.style.background='white'">
                            <td class="fw-semibold text-capitalize" style="color:#d6336c;">{{ $module }}</td>
                            @foreach($actions as $action)
                                @php $perm = $module . '_' . $action; @endphp
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $perm }}"
                                           {{ $user->permissions->contains('name', $perm) ? 'checked' : '' }}
                                           style="width:18px; height:18px; accent-color:#ff6f91;">
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button class="btn px-4 py-2"
                    style="background:#ff8fa3; color:white; border-radius:25px; font-weight:500; box-shadow:0 3px 6px rgba(0,0,0,0.1);">
                💾 Simpan
            </button>
            <a href="{{ route('users.index') }}"
               class="btn px-4 py-2 ms-2"
               style="background:#ffe5ec; color:#d6336c; border-radius:25px; font-weight:500;">
               ⬅️ Kembali
            </a>
        </div>
    </form>
</div>
@endsection
