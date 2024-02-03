<?php

namespace App\Traits;

use App\Criteria\CriteriaInterface;

trait CollectionTrait
{
    private $criteria = [];

    private function __construct(CriteriaInterface ...$criteria)
    {
        $this->criteria = $criteria;
    }

    public static function create(array $criteria): self
    {
        return new static(...$criteria);
    }
}
