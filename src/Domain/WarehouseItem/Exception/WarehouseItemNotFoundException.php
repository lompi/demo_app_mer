<?php

declare(strict_types=1);

namespace App\Domain\WarehouseItem\Exception;

use App\Domain\Shared\Exception\NotFoundException;
use App\Domain\Warehouse\WarehouseId;

class WarehouseItemNotFoundException extends NotFoundException
{
    public static function byId(WarehouseId $warehouseId): self
    {
        return new self("Not found warehouse with id `{$warehouseId}`.");
    }
}
