<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function stat()
    {
        return view('admin.Dashboard-Statistiques');
    }
}
