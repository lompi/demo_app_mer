<?php

namespace App\Domain\Warehouse;

class Warehouse
{
    public function __construct(
        private WarehouseId $id,
        private WarehousePriority $priority,
    ) {
    }

    public function id(): WarehouseId
    {
        return $this->id;
    }

    public function priority(): WarehousePriority
    {
        return $this->priority;
    }
}
