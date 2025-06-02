<?

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Support\Collection;

interface TokenRepositoryInterface
{
    public function getAllTokens(User $user): Collection;
    public function deleteToken(User $user, string $token_id): bool;
}
