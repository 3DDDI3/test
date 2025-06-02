<?php

declare(strict_types=1);

namespace App\Traits;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasFilter
 *
 * @method static Builder filter(Filter $filter)
 */
trait HasFilter
{
    /**
     * @param Builder $builder
     * @param Filter $filter
     * @return Builder
     */
    public function scopeFilter(Builder $builder, BaseFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
