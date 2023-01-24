<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "User") {
                $data = [
                    'title' => "Profil Saya"
                ];
                return view('page.user.profile-index', compact('data'));
            }

            elseif (Auth::user()->role == "Admin") {
                $data = [
                    'title' => "Profil Sekolah",
                ];
                return view('page.admin.profile-index', compact('data'));
            }
            else {
                return abort(401);
            }
        } else{
            return redirect('/login');
        };
    }
}
