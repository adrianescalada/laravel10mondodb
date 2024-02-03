<?php

namespace App\Criteria;

use App\Criteria\CriteriaInterface;

trait AppliesCriteria
{
    public function scopeApply($query, CriteriaInterface $criteria)
    {
        $criteria->apply($query);

        return $query;
    }
}
