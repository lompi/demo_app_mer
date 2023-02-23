<?php

namespace App\Domain\Warehouse;

use Webmozart\Assert\Assert;

class WarehousePriority
{
    public function __construct(
        private int $value,
    ) {
        Assert::greaterThanEq(0, $this->value, 'Priority value should be grater or equal 0.');
    }

    public function isMoreImportantThan(self $otherPriority): bool
    {
        return $this->value < $otherPriority->value;
    }
}
