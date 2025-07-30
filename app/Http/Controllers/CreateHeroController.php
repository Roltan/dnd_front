<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateHeroController extends Controller
{
    function step1()
    {
        $klass = Http::get(env('APP_URL') . '/library/api/klass/list')->json();
        $race = Http::get(env('APP_URL') . '/library/api/race/list')->json();

        return view('pages.create-hero.step1', [
            'klass' => $klass['klasses'],
            'race' => $race['races']
        ]);
    }
}
