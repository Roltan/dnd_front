<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ComponentController extends Controller
{
    public function error(Request $request): View
    {
        return view('elements.error', [
            'error' => $request->query('error')
        ]);
    }
}
