<?php

namespace App\Http\Controllers;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('qr-code.index');
    }
}
