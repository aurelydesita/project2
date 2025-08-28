@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6f61;">📜 Riwayat Aktivitas User</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-warning">
            <tr>
                <th>👤 User</th>
                <th>🍴 Menu Dilihat</th>
                <th>⏰ Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $history->user->name }}</td>
                    <td>{{ $history->content->title }}</td>
                    <td>{{ $history->viewed_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
       class="btn px-4 py-2 rounded-pill shadow-sm"
       style="background-color:#bc8ed8ff; color:white;">
        🏠 Kembali ke Dashboard
    </a>
</div>
@endsection
