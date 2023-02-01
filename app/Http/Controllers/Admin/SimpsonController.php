<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simpson;
use Illuminate\Http\Request;

class SimpsonController extends Controller
{
    public function index()
    {
        $data = Simpson::latest()->get();

        return view('pages.admin.simpson.index', compact('data'));
    }
}
