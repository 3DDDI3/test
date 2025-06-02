<?

namespace App\Repositories;

use App\Events\StatusOrderChangedNotification;
use App\Models\Order;
use App\Models\WorkerExOrderType;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function attachWorker(string $order_id, string $worker_id): bool
    {
        $order = Order::query()->find($order_id);

        if (!$order)
            return false;

        $orderWorker =  $order->orderWorker()->first();

        if (!$orderWorker)
            return false;

        $orderWorker->fill(['worker_id' => $worker_id])
            ->save();

        return true;
    }

    public function checkOrderType(string $order_id, string $worker_id): bool
    {
        $order = Order::query()->find($order_id);

        if (WorkerExOrderType::query()->where(['worker_id' => $worker_id])->where(['order_type_id' => $order->order_type_id])->count() > 0)
            return false;

        return true;
    }

    public function refreshOrderStatus(string $order_id): ?string
    {
        $order = Order::query()->find($order_id);

        if (!$order)
            return null;

        $order->fill(['status' => 'Завершен'])
            ->save();

        return $order->orderWorker()->first()->id;
    }
}
