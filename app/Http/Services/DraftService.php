<?

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class DraftService extends Service
{
    public function getList()
    {
        $response = Http::withHeader('Authorization', 'Bearer ' . request()->cookie('auth_token'))
            ->get(env('APP_URL') . '/hero/api/draft/list')
            ->json();

        if (!$response['status'])
            return back()->with('error', $response['message']);

        $drafts = $this->objResponse($response['drafts']);

        return $drafts;
    }

    public function getOne(?int $id)
    {
        $response = Http::withHeader('Authorization', 'Bearer ' . request()->cookie('auth_token'));
        if ($id == null) {
            $response = $response->post(env('APP_URL') . '/hero/api/draft/new');
        } else {
            $response = $response->get(env('APP_URL') . '/hero/api/draft/' . $id);
        }

        $response = $response->json();
        if (!$response['status'])
            return back()->with('error', $response['message']);

        if ($id == null)
            return (object) [
                'id' => $response['id'],
                "hero_name" =>  null,
                "lvl" => null,
                "exp" => null,
                "klass" => null,
                "sub_klass" => null,
                "race" => null,
                "sub_race" => null,
                "background" => null
            ];

        $response['draft']['id'] = $id;

        return (object) $response['draft'];
    }
}
