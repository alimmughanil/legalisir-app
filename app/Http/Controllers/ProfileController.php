<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Profil Saya"
        ];
        return view('page.user.profile-index', compact('data'));
    }
}
