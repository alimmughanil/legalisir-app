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
        $user_id = Auth::user()->id;
        $document = Document::where('user_id',$user_id)->with('user.profile.school')->first();
        $data = [
            'title' => "Data Dokumen",
            'document'=>$document
        ];
        return view('page.user.document-index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Tambah Data Dokumen Baru",
        ];
        return view('page.user.document-create', compact('data'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validatedData = $request->validate([
            'ijazah' => ['required', 'file', 'image'],
            'transkrip' => ['required', 'file', 'image'],
        ]);
        
        $ijazahFileName = $user_id.'-ijazah-'. Str::random(16) . $request->file('ijazah')->getClientOriginalName();
        $transkripFileName = $user_id.'-transkrip-'. Str::random(16) . $request->file('transkrip')->getClientOriginalName();

        $request->file('ijazah')->move(public_path('/storage/image'), $ijazahFileName);
        $request->file('transkrip')->move(public_path('/storage/image'), $transkripFileName);

        $validatedData['user_id'] = $user_id;
        $validatedData['ijazah'] = '/storage/image/'.$ijazahFileName;
        $validatedData['transkrip'] = '/storage/image/'.$transkripFileName;

        $store = Document::create($validatedData);
        $message = "Tambah Data Dokumen Gagal";
        if ($store) {
            $message = "Tambah Data Dokumen Berhasil";
        }
            
        return redirect('/document')->with('message',$message);
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
        $document = Document::where('id',$id)->first();
        $data = [
            'title' => "Edit Data Dokumen",
            'document'=>$document
        ];
        return view('page.user.document-edit', compact('data'));
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
        $validatedData = $request->validate([
            'ijazah' => ['file', 'image'],
            'transkrip' => ['file', 'image'],
        ]);
        

        $document = Document::where('id',$id)->first();
        if ($request->file('ijazah')) {
            $ijazahFileName = $id.'-ijazah-'. Str::random(16) . $request->file('ijazah')->getClientOriginalName();
            File::delete(public_path($Document->ijazah));
            $request->file('ijazah')->move(public_path('/storage/image'), $ijazahFileName);
            $validatedData['ijazah'] = '/storage/image/'.$ijazahFileName;
        }
        if ($request->file('transkrip')) {
            $transkripFileName = $id.'-transkrip-'. Str::random(16) . $request->file('transkrip')->getClientOriginalName();
            File::delete(public_path($Document->transkrip));
            $request->file('transkrip')->move(public_path('/storage/image'), $transkripFileName);
            $validatedData['transkrip'] = '/storage/image/'.$transkripFileName;
        }

        $update = $Document->update($validatedData);
        $message = "Edit Data Dokumen Gagal";
        if ($update) {
            $message = "Edit Data Dokumen Berhasil";
        }
            
        return redirect('/document')->with('message',$message);
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
