<?php

namespace App\Domain\WarehouseItem\WarehouseItemLocator;

use App\Domain\WarehouseItem\WarehouseItemId;
use Webmozart\Assert\Assert;

class LocatedProduct
{
    public function __construct(
        private WarehouseItemId $warehouseItemId,
        private int $quantity,
    ) {
        Assert::greaterThan(0, $quantity);
    }

    public function warehouseItemId(): WarehouseItemId
    {
        return $this->warehouseItemId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }
}
