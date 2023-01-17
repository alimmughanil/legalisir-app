<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Livewire\DashboardIndex;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = new DashboardIndex;
        return $dashboard->render();
    }
}
