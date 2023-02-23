<?php

namespace App\Domain\WarehouseItem\WarehouseItemLocator;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\WarehouseItemLocator\Exception\NotEnoughInShopException;

interface WarehouseItemLocatorInterface
{
    /**
     * @return LocatedProduct[]
     *
     * @throws NotEnoughInShopException
     */
    public function locateProduct(ProductId $productId, int $expectedQuantity): array;
}
