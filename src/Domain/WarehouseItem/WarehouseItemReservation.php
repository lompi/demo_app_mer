<?php

namespace App\Domain\WarehouseItem;

use App\Domain\Lead\LeadId;

class WarehouseItemReservation
{
    public function __construct(
        private WarehouseItemId $warehouseItemId,
        private LeadId $reservedFor,
        private int $quantity,
    ) {
    }

    public function warehouseItemId(): WarehouseItemId
    {
        return $this->warehouseItemId;
    }

    public function reservedFor(): LeadId
    {
        return $this->reservedFor;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }
}
