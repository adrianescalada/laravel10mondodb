<?php

namespace App\Http\Classes;

use App\Criteria\CriteriaInterface;

class CompareCriteria implements CriteriaInterface
{
    private $field;

    private $value;

    public function __construct(string $field, string $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    public function apply($query)
    {
        $query->where($this->field, $this->value);
    }
}
