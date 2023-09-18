<?php

namespace App\Http\Controllers;

use App\Models\Document;

class HomeController extends Controller
{
    public function index()
    {
        $documents = Document::where('disponibilite', 1)->orderBy('created_at', 'desc')->limit(20)->get();
        return view('user.home', ['documents' => $documents]);
    }
}
