<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DashboardIndex;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            'title' => "Dashboard"
        ];
        if (Auth::check()) {
            if ($user->role == "User") {
                $document = Document::where('user_id',$user->id)->with('user.profile.school')->first();
                if ($document) {
                    return view('page.user.dashboard-index', compact('data'));
                } else {
                    return redirect('/document/create')->with('message', 'Silahkan Isi Data Dokumen Terlebih Dahulu');
                }
            }
            elseif (Auth::user()->role == "Admin") {
                return view('page.admin.dashboard-index', compact('data'));
            }
            elseif (Auth::user()->role == "Super Admin") {
                return view('page.superadmin.dashboard-index', compact('data'));
            }
            else {
                return abort(401);
            }
        } else{
            return redirect('/login');
        };
    }
}
