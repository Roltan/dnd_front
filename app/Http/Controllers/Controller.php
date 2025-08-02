<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function user()
    {
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . request()->cookie('auth_token')
        ])->get(env('APP_URL') . '/auth/api/info')->json();
        return $user;
    }

    protected function objResource(AnonymousResourceCollection $collection)
    {
        return $collection->map(function ($resource) {
            return (object) $resource->toArray(request());
        });
    }
}
