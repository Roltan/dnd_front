<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\DraftHero;
use Illuminate\Database\Eloquent\Collection;

class DraftHeroRepository
{
    static public function getByUser(int $userId): array|Collection
    {
        return DraftHero::query()
            ->where('user_id', $userId)
            ->get();
    }

    static public function getFieldStep1(DraftHero $draftHero, int $userId): object
    {
        if ($draftHero->id == null)
            return (object) [
                'hero_name' => null,
                'lvl' => null,
                'exp' => null,
                'klass' => null,
                'sub_klass' => null,
                'race' => null,
                'sub_race' => null,
                'background' => null
            ];

        if ($draftHero->user_id != $userId)
            throw new NotFoundException('Не ваш черновик', 403);

        return (object) $draftHero->only([
            'hero_name',
            'lvl',
            'exp',
            'klass',
            'sub_klass',
            'race',
            'sub_race',
            'background'
        ]);
    }
}
