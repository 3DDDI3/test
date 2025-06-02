<?

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\TokenRepositoryInterface;
use Illuminate\Support\Collection;


class TokenRepository implements TokenRepositoryInterface
{
    /**
     * Получение всех токенов текущего пользователя
     *
     * @param User $user
     * @return Collection
     */
    public function getAllTokens(User $user): Collection
    {
        return $user->tokens;
    }

    /**
     * Удаление конкретного токена у пользователя
     *
     * @param User $user
     * @param string $token_id
     * @return boolean
     */
    public function deleteToken(User $user, string $token_id): bool
    {
        $token = $user->tokens()->find($token_id);
        if (!$token)
            return false;

        return $token->delete();
    }
}
