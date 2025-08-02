<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hero\GeneralInfoRequest;
use App\Http\Resources\Hero\DraftsResource;
use App\Models\DraftHero;
use App\Repositories\DraftHeroRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateHeroController extends Controller
{
    public function drafts()
    {
        $userId = $this->user()['id'];

        $drafts = DraftHeroRepository::getByUser($userId);

        if ($drafts->count() <= 1)
            return redirect('/create/hero');

        $drafts = DraftsResource::collection($drafts);
        $drafts = $this->objResource($drafts);
        return view('pages.create-hero.list', ['drafts' => $drafts]);
    }

    public function general(DraftHero $draftHero): View
    {
        $klass = Http::get(env('APP_URL') . '/library/api/klass/list')->json();
        $background = Http::get(env('APP_URL') . '/library/api/background/list')->json();

        $data['draft'] = DraftHeroRepository::getFieldStep1($draftHero, $this->user()['id']);
        $data['klass'] = $klass['klasses'];
        $data['background'] = $background['backgrounds'];

        return view('pages.create-hero.step1', $data);
    }

    public function roll(GeneralInfoRequest $request): View
    {
        $data = $request->validated();
        DraftHero::create($data + ['user_id' => $this->user()['id']]);

        return view('pages.create-hero.step2');
    }
}
