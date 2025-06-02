<?

namespace App\Repositories;

use App\Filters\BaseFilter;
use App\Models\Worker;
use App\Repositories\Contracts\WorkerRepositoryInterface;
use Illuminate\Support\Collection;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function getWorkers(BaseFilter $filter): Collection
    {
        $worker = Worker::filter($filter)->get();
        return $worker;
    }
}
