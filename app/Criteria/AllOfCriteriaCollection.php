<?php

namespace App\Criteria;

use App\Criteria\CriteriaInterface;
use App\Traits\CollectionTrait;

class AllOfCriteriaCollection implements CriteriaInterface
{
    use CollectionTrait;

    public function apply($query)
    {
        $query->where(function ($innerQuery) {
            foreach ($this->criteria as $criteria) {
                $criteria->apply($innerQuery);
            }
        });
    }
}
