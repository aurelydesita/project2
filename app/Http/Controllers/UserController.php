<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
   public function __construct()
{
    // Middleware permission
    $this->middleware('permission:user_read')->only(['index', 'show']);
    $this->middleware('permission:user_create')->only(['create', 'store']);
    $this->middleware('permission:user_write')->only(['edit', 'update', 'edit', 'updateRoles']);
    $this->middleware('permission:user_delete')->only(['destroy']);
}

    /** =====================
     *  CRUD USER
     *  ===================== */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Kirim email ke Mailtrap
    Mail::to($user->email)->send(new WelcomeMail($user));

    Auth::login($user);

    return redirect()->route('user.dashboard')->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name.'!');
    
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    /** =====================
     *  PERMISSIONS / ROLES
     *  ===================== */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.permissions', compact('user', 'roles'));
    }

    public function updateRoles(Request $request, User $user)
{
    if ($user->hasRole('admin')) {
        return redirect()->route('users.index')->with('warning', 'Admin tidak boleh diubah lewat sini.');
    }

    $request->validate([
        'roles' => 'array',
        'permissions' => 'array'
    ]);

    // Update roles
    $user->syncRoles($request->roles ?? []);

    // Kalau role bukan admin → baru sync permissions manual
    if (!$user->hasRole('admin')) {
        $user->syncPermissions($request->permissions ?? []);
    }

    return redirect()->route('users.index')->with('success', 'Hak akses berhasil diperbarui.');
}
}