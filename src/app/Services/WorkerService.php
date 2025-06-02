<?

namespace App\Services;

use App\Filters\BaseFilter;
use App\Repositories\Contracts\WorkerRepositoryInterface;

class WorkerService
{
    protected WorkerRepositoryInterface $workerRepository;

    public function __construct(WorkerRepositoryInterface $workerRepository)
    {
        $this->workerRepository = $workerRepository;
    }

    public function showWorkers(BaseFilter $filter)
    {
        return $this->workerRepository->getWorkers($filter);
    }
}
