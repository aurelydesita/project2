<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin'); // bikin view admin
    }

    public function user()
    {
        return view('dashboard.user'); // bikin view user
}
}

