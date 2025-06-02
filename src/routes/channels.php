<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('order.{order_id}.worker.{worker_id}.notification', function (User $user, $order_id) {
    $order = Order::query()->find($order_id);
    return true;
});
