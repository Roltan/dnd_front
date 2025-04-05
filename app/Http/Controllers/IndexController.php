<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $status = Http::withHeaders([
                'Authorization' => 'Bearer ' . $request->header('Authorization')
//                'Authorization' => 'Bearer 7|pOZW0lisFSuaTjQ9RNIDknU7X7QKeuX2lJbJV7Ft09b06219'
            ])->get(env('APP_URL').'/auth/api/check');
        if (!$status['authenticated'])
            return redirect('/login');

        return view('pages.welcome');
    }

    public function login()
    {
        return view('pages.auth.login');
    }
}
