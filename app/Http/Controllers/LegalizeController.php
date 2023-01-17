<?php

namespace App\Http\Controllers;

use App\Models\Legalize;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Livewire\User\Legalize\Edit;
use App\Http\Livewire\User\Legalize\Index as LegalizeIndex;
use App\Http\Livewire\User\Legalize\Create as LegalizeCreate;

class LegalizeController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $legalize = Legalize::where('user_id',$user_id)->first();
        $data = [
            'title' => "Data Legalisir",
            'legalize'=>$legalize
        ];
        return view('livewire.user.legalize.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(LegalizeCreate $create)
    {
        return $create->render();
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

        $store = Legalize::create($validatedData);
        $message = "Tambah Data Legalisir Gagal";
        if ($store) {
            $message = "Tambah Data Legalisir Berhasil";
        }
            
        return redirect('/legalize')->with('message',$message);
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
        $legalize = Legalize::where('id',$id)->first();
        $data = [
            'title' => "Edit Data Legalisir",
            'legalize'=>$legalize
        ];
        return view('livewire.user.legalize.edit', compact('data'));
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
        

        $legalize = Legalize::where('id',$id)->first();
        if ($request->file('ijazah')) {
            $ijazahFileName = $id.'-ijazah-'. Str::random(16) . $request->file('ijazah')->getClientOriginalName();
            File::delete(public_path($legalize->ijazah));
            $request->file('ijazah')->move(public_path('/storage/image'), $ijazahFileName);
            $validatedData['ijazah'] = '/storage/image/'.$ijazahFileName;
        }
        if ($request->file('transkrip')) {
            $transkripFileName = $id.'-transkrip-'. Str::random(16) . $request->file('transkrip')->getClientOriginalName();
            File::delete(public_path($legalize->transkrip));
            $request->file('transkrip')->move(public_path('/storage/image'), $transkripFileName);
            $validatedData['transkrip'] = '/storage/image/'.$transkripFileName;
        }

        $update = $legalize->update($validatedData);
        $message = "Edit Data Legalisir Gagal";
        if ($update) {
            $message = "Edit Data Legalisir Berhasil";
        }
            
        return redirect('/legalize')->with('message',$message);
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
