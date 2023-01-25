<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "User") {
                $data = [
                    'title' => "Pesanan Saya"
                ];

                return view('page.user.order-index', compact('data'));
            }

            elseif (Auth::user()->role == "Admin") {
                $data = [
                    'title' => "Data Pesanan"
                ];
                return view('page.admin.order-index', compact('data'));
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
        $document = Document::where('user_id',$user_id)->with('user.profile.school')->first();
        if ($document) {
            if ($document->status == "Pending") {
                return redirect('/document')->with('message', 'Validasi Dokumen Sedang Diproses');
            }
            if ($document->status == "Reject") {
                return redirect('/document')->with('message', 'Pengajuan dokumen ditolak, mohon edit dokumen anda dengan benar');
            }
            $data = [
                'title'=>'Buat Pesanan Legalisir Dokumen'
            ];
            return view('page.user.order-create', compact('data'));
        } else {
            return redirect('/document/create')->with('message', 'Silahkan Isi Data Dokumen Terlebih Dahulu');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
