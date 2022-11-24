<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == '1') {
                return view('admin.dashboard');
            } else {
                return view('frontend.user.dashboard');
            }
        } else {
            return redirect('/');
        }
    }
}
