<?php

namespace App\Domain\Lead\LeadWithReservedProducts;

use App\Domain\WarehouseItem\WarehouseItemId;
use Webmozart\Assert\Assert;

class ReservedProduct
{
    public function __construct(
        private WarehouseItemId $warehouseItemId,
        private int $quantity,
    ) {
        Assert::greaterThan(0, $this->quantity);
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
