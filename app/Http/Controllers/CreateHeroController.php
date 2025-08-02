<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateHeroController extends Controller
{
    public function step1()
    {
        $klass = Http::get(env('APP_URL') . '/library/api/klass/list')->json();
        $background = Http::get(env('APP_URL') . '/library/api/background/list')->json();

        return view('pages.create-hero.step1', [
            'klass' => $klass['klasses'],
            'background' => $background['backgrounds'],
        ]);
    }
}
