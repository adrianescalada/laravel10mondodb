<?php

namespace App\Criteria;

use App\Criteria\CriteriaInterface;
use App\Traits\CollectionTrait;

class OneOfCriteriaCollection implements CriteriaInterface
{
    use CollectionTrait;

    public function apply($query)
    {
        $query->where(function ($innerQuery) {
            foreach ($this->criteria as $criteria) {
                $innerQuery->orWhere(function ($anotherInnerQuery) use ($criteria) {
                    $criteria->apply($anotherInnerQuery);
                });
            }
        });
    }
}
