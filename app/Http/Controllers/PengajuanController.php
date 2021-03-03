<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    //
    public function index(Request $request){
        // kirim email
        $details = [
            'fullname' => $request->input('firstname')." ".$request->input('lastname'),
            'category' => $request->input('category'),
            'email' => $request->input('email'),
            'telp' => $request->input('no_telp'),
            'text' => ($request->input('text')) ? $request->input('text') : '-',
        ];
       
        \Mail::to('jonatan.teofilus@gmail.com')->send(new \App\Mail\PengajuanMail($details));
       
    }

}
