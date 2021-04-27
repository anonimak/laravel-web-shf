<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PengajuanController extends Controller
{
    //
    public function index(Request $request)
    {
        // kirim email
        $details = [
            'fullname' => $request->input('firstname') . " " . $request->input('lastname'),
            'category' => $request->input('category'),
            'email' => $request->input('email'),
            'telp' => $request->input('no_telp'),
            'text' => ($request->input('text')) ? $request->input('text') : '-',
        ];

        \Mail::to($request->input('email'))->send(new \App\Mail\PengajuanMail($details));
        return Redirect::back()->with('success', 'Email sent.');
    }
}
