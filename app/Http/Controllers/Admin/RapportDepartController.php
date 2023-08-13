<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class RapportDepartController extends Controller
{
    public function index() : View
    {
        return view('admin.rapports.depart-de-pret');
    }

    public function create(Document $document, string $name, string $email)
    {
        return view('admin.rapports.depart-de-pret', [
            'document' => $document,
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function store()
    {

    }
}
