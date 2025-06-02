<?

namespace App\Repositories\Contracts;

use App\Filters\BaseFilter;
use Illuminate\Support\Collection;

interface WorkerRepositoryInterface
{
    public function getWorkers(BaseFilter $filter): Collection;
}
