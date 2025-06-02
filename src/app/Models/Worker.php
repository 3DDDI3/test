<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Worker extends Model
{
    use HasFactory, HasFilter;

    public function exOrderTypes(): HasMany
    {
        return $this->hasMany(WorkerExOrderType::class);
    }

    public function excludeOrderTypes(): BelongsToMany
    {
        return $this->belongsToMany(OrderType::class, WorkerExOrderType::class);
    }
}
