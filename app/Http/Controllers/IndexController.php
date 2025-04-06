<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }
}
