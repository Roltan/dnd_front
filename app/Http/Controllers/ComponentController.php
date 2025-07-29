<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ComponentController extends Controller
{
    public function modal(Request $request): View
    {
        $type = $request->query('error') ? 'error' : 'warning';
        $msg = $type == 'error' ? $request->query('error') : $request->query('message');

        return view('elements.modal', [
            'type' => $type,
            'msg' => $msg,
        ]);
    }
}
