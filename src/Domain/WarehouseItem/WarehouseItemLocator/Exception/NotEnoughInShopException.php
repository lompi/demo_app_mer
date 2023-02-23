<?php

declare(strict_types=1);

namespace App\Domain\WarehouseItem\WarehouseItemLocator\Exception;

use App\Domain\Product\ProductId;
use App\Domain\Shared\Exception\NotFoundException;

class NotEnoughInShopException extends NotFoundException
{
    public static function create(ProductId $productId, int $expectedQuantity): self
    {
        return new self("Not found {$expectedQuantity} `{$productId}` products in all warehouses.");
    }
}
