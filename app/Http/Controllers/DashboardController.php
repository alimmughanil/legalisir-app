<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DashboardIndex;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Dashboard"
        ];
        return view('page.user.dashboard-index', compact('data'));
    }
}
