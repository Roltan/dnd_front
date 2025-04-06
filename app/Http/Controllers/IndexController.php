<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $status = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->cookie('auth_token')
//                'Authorization' => 'Bearer 7|pOZW0lisFSuaTjQ9RNIDknU7X7QKeuX2lJbJV7Ft09b06219'
        ])->get(env('APP_URL') . '/auth/api/check')
            ->json();
        if (!$status['authenticated'])
            return redirect('/login');

        return view('pages.welcome');
    }

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
}
