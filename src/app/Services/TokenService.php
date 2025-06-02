<?

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\TokenRepositoryInterface;
use Illuminate\Support\Collection;

class TokenService
{
    protected TokenRepositoryInterface $tokenRepository;

    public function __construct(TokenRepositoryInterface $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Получение токуенов текущего пользователя
     *
     * @param User $user
     * @return Collection
     */
    public function getUserTokens(User $user): Collection
    {
        return $this->tokenRepository->getAllTokens($user);
    }

    /**
     * Удаление конкретного токена у пользователя
     *
     * @param User $user
     * @param string $token_id
     * @return boolean
     */
    public function deleteUserToken(User $user, string $token_id): bool
    {
        return $this->tokenRepository->deleteToken($user, $token_id);
    }
}
