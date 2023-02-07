<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Livewire\User\Document\Edit;
use App\Http\Livewire\User\Document\Index as DocumentIndex;
use App\Http\Livewire\User\Document\Create as DocumentCreate;

class DocumentController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "User") {
                $user_id = Auth::user()->id;
                $document = Document::where('user_id',$user_id)->with('user.profile.school')->first();
                if ($document) {
                    $data = [
                        'title' => "Data Dokumen",
                        'document'=>$document
                    ];
                    return view('page.user.document-index', compact('data'));
                } else {
                    return redirect('/document/create')->with('message', 'Silahkan Isi Data Dokumen Terlebih Dahulu');
                }
            }

            elseif (Auth::user()->role == "Admin") {
                $data = [
                    'title' => "Data Dokumen",
                ];
                return view('page.admin.document-index', compact('data'));
            }
            else {
                return abort(401);
            }
        } else{
            return redirect('/login');
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $document = Document::where('user_id',$user_id)->with('user')->first();
        if ($document) {
            return redirect('/document')->with('message', 'Anda sudah memiliki dokumen yang terdaftar');
        }
        $data = [
            'title' => "Tambah Data Dokumen Baru",
        ];
        return view('page.user.document-create', compact('data'));
    }
    
    public function edit($id)
    {
        $document = Document::where('id',$id)->with('user')->first();
        if ($document) {
            $data = [
                'title' => "Edit Data Dokumen",
                'document'=>$document
            ];
            return view('page.user.document-edit', compact('data'));
        } else {
            return redirect('/document/create')->with('message', 'Silahkan Data Dokumen Terlebih Dahulu');
        }
    }
}