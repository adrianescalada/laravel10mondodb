<?php

namespace App\Criteria;

use App\Criteria\CriteriaInterface;
use App\Traits\CollectionTrait;

class CriteriaCollection implements CriteriaInterface
{
    use CollectionTrait;

    public static function oneOf(array $criteria): OneOfCriteriaCollection
    {
        return OneOfCriteriaCollection::create($criteria);
    }

    public static function allOf(array $criteria): AllOfCriteriaCollection
    {
        return AllOfCriteriaCollection::create($criteria);
    }

    public function apply($query)
    {
        foreach ($this->criteria as $criteria) {
            $criteria->apply($query);
        }
    }
}
