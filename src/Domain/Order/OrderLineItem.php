<?php

namespace App\Domain\Order;

use App\Domain\Lead\LeadWithReservedProducts\ReservedProduct;
use App\Domain\WarehouseItem\WarehouseItemId;
use Webmozart\Assert\Assert;

class OrderLineItem
{
    public function __construct(
        private WarehouseItemId $warehouseItemId,
        private int $quantity,
    ) {
        Assert::greaterThan(0, $this->quantity);
    }

    public static function createFromReservedProduct(ReservedProduct $reservedProduct): self
    {
        return new self(
            $reservedProduct->warehouseItemId(),
            $reservedProduct->quantity(),
        );
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
