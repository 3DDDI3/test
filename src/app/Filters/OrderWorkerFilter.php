<?php

namespace App\Filters;

use App\Models\OrderType;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class OrderWorkerFilter extends BaseFilter
{
    /**
     * Фильтрация по категории
     *
     * @param string $value
     * @return Builder
     */
    protected function orderTypes(array $value): Builder
    {
        $excludedWorkers = DB::table('workers_ex_order_types');
        //     ->select('worker_id')
        //     ->whereIn('order_type_id', $value)
        //     ->groupBy('worker_id')
        //     ->havingRaw('COUNT(*) = ?', [count($value)])
        //     ->pluck('worker_id');

        // $workers = Worker::whereNotIn('id', $excludedWorkers)->get();

        // dd($workers);

        return $this->builder->where(function ($query) use ($value) {
            $query->whereDoesntHave('excludeOrderTypes', function ($q) use ($value) {
                $q->whereIn('order_type_id', $value);
            })
                ->orWhereHas('excludeOrderTypes', function ($q) use ($value) {
                    $q->select('worker_id')
                        ->whereIn('order_type_id', $value)
                        ->groupBy('worker_id')
                        ->havingRaw('COUNT(*) < ?', [count($value)]);
                });
        });
    }
}
