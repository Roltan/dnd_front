<?

namespace App\Http\Services;

class Service
{
    protected function objResponse(array $arr): array
    {
        return array_map(function ($item) {
            return (object) $item;
        }, $arr);
    }
}
