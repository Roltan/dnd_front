<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hero\GeneralInfoRequest;
use App\Http\Services\DraftService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Http;

class CreateHeroController extends Controller
{
    public function drafts(DraftService $service): View | Redirector |RedirectResponse
    {
        $drafts = $service->getList();

        if (count($drafts) < 1)
            return redirect('/create/hero');

        return view('pages.create-hero.list', ['drafts' => $drafts]);
    }

    public function general(DraftService $service, ?int $draftId = null): View
    {
        $klass = Http::get(env('APP_URL') . '/library/api/klass/list')->json();
        $background = Http::get(env('APP_URL') . '/library/api/background/list')->json();

        return view('pages.create-hero.step1', [
            'draft' => $service->getOne($draftId),
            'klass' => $klass['klasses'],
            'background' => $background['backgrounds']
        ]);
    }

    public function roll(GeneralInfoRequest $request): View
    {
        $data = $request->validated();

        return view('pages.create-hero.step2');
    }
}
