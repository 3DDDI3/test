<?php

namespace App\Http\Controllers;

use App\Filters\OrderWorkerFilter;
use App\Models\Worker;
use App\Services\WorkerService;

class WorkerController extends Controller
{
    protected WorkerService $workerService;

    public function __construct(WorkerService $workerService)
    {
        $this->workerService = $workerService;
    }

    /**
     *  @OA\Get(
     *      path="/api/workers",
     *      operationId="showWorkers",
     *      tags={"Worker"},
     *      summary="Получение списка испольнителей",
     *      description="Получение списка исполнителей",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * )
     *
     * @param OrderWorkerFilter $filter
     * @return void
     */
    public function index(OrderWorkerFilter $filter)
    {
        return response($this->workerService->showWorkers($filter));
    }
}
