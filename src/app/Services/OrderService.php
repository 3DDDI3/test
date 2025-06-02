<?

namespace App\Services;

use App\Events\StatusOrderChangedNotification;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class OrderService
{
    protected OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Привязка исполнителя
     *
     * @param string $order_id
     * @param FormRequest $request
     * @return boolean
     */
    public function attachWorker(string $order_id, FormRequest $request): bool
    {
        $data = $request->validated();

        if (! $this->orderRepository->checkOrderType($order_id, $data['worker']))
            return false;

        return $this->orderRepository->attachWorker($order_id, $data['worker']);
    }

    /**
     * Обновление статуса заказа
     *
     * @param string $order_id
     * @return void
     */
    public function refreshOrderStatus(string $order_id)
    {
        $worker = (int)$this->orderRepository->refreshOrderStatus($order_id);

        broadcast(new StatusOrderChangedNotification($order_id, $worker, "Статус заказа изменен"));
    }
}
