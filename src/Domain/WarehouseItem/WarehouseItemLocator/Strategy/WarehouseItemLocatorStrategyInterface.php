<?php

namespace App\Domain\WarehouseItem\WarehouseItemLocator\Strategy;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\WarehouseItemLocator\Exception\NotEnoughInShopException;
use App\Domain\WarehouseItem\WarehouseItemLocator\LocatedProduct;

interface WarehouseItemLocatorStrategyInterface
{
    /**
     * @return LocatedProduct[]
     *
     * @throws NotEnoughInShopException
     */
    public function locateProduct(ProductId $productId, int $expectedQuantity): array;
}
