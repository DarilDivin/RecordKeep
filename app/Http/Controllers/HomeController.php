<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->limit(20)->get();
        return view('user.home', ['documents' => $documents]);
    }
}