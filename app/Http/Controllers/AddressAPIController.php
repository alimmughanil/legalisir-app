<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AddressAPIController extends Controller
{
    public string $baseUrl;
    public function __construct(){
        $this->baseUrl = 'https://kodepos.vercel.app/';
    }
    public function getAddressByUrban(Request $request){
        $client = new Client();
        $baseUrl = 'https://kodepos.vercel.app/search/?q=';
        $res = $client->request('GET', $baseUrl . $request['query']);
        $data = $res->getBody()->getContents();
        return response(json_decode($data)->data);
    }
    public function getProvince(){
        $client = new Client();
        
        // $res = $client->request('GET', '', [
        //     'auth' => ['user', 'pass']
        // ]);
        
        $data = [
            'province'=>$this->baseUrl
        ];
        return response()->json($data,200);
    }
}
