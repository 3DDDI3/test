<?

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function attachWorker(string $order_id, string $worker_id): bool;

    public function  checkOrderType(string $order_id, string $worker_id): bool;

    public function refreshOrderStatus(string $order_id): ?string;
}
