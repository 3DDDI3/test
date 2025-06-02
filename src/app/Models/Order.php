<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function orderWorker(): HasMany
    {
        return $this->hasMany(OrderWorker::class);
    }

    public function exOrderTypes(): HasMany
    {
        return $this->hasMany(WorkerExOrderType::class);
    }
}
