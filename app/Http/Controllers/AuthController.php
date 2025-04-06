<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('pages.auth.login');
    }

    public function register(): View
    {
        return view('pages.auth.register');
    }

    public function forgot(): View
    {
        return view('pages.auth.forgot');
    }

    public function reset(Request $request)
    {
        $response = Http::post(env('APP_URL') . '/auth/api/password/viewReset', [
            'email'=>$request->query('email'),
            'token'=>$request->query('token')
        ])->json();

        if(!$response['status'])
            return redirect('/forgot')->with('error', $response['message']);

        return view('pages.auth.reset', [
            'email' => $request->query('email')
        ]);
    }
}
