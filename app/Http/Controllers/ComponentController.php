<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ComponentController extends Controller
{
    public function modal(Request $request): View
    {
        $type = $request->query('modal')? 'modal': 'warning';
        $msg = $type == 'modal'?$request->query('modal') : $request->query('message');
        return view('elements.modal', [
            'type' => $type,
            'msg' => $msg,
        ]);
    }
}
