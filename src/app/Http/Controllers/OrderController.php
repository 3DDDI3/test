<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachEmployeeRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Назначение исполнителя на закакз
     *
     *  @OA\Post(
     *      path="/api/orders/{order_id}/worker",
     *      operationId="pinWorker",
     *      tags={"Order"},
     *      summary="Привязка исполнителя к заказу",
     *      description="Возвращает пустой массив",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AttachEmployeeRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content"
     *      )
     * )
     * @return void
     */
    public function attachWorker(AttachEmployeeRequest $request, string $order_id)
    {
        if ($this->orderService->attachWorker($order_id, $request))
            return response(null);
        else return response(['Что-то пошло не так'], 400);
    }

    /**
     * Обновление статуса заказа
     *
     * @OA\Patch(
     *      path="/api/orders/{order_id}",
     *      operationId="refresOrder",
     *      tags={"Order"},
     *      summary="Обновление статуса заказа",
     *      description="Обновляет статус закаказа",
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
     * @param string $order_id
     * @return void
     */
    public function refreshOrderStatus(string $order_id)
    {
        $this->orderService->refreshOrderStatus($order_id);
    }
}
