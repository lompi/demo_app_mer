<?php

declare(strict_types=1);

namespace App\Domain\WarehouseItem\Exception;

use App\Domain\Product\ProductId;
use App\Domain\Shared\Exception\NotFoundException;
use App\Domain\Warehouse\WarehouseId;

class NotEnoughProductsInWarehouseException extends NotFoundException
{
    public static function create(WarehouseId $warehouseId, ProductId $productId, int $expectedQuantity): self
    {
        return new self("`{$warehouseId}` warehouse has less than {$expectedQuantity} `{$productId}` products.");
    }
}
