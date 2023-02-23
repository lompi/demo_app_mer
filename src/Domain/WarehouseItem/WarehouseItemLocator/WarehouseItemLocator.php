<?php

namespace App\Domain\WarehouseItem\WarehouseItemLocator;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\WarehouseItemLocator\Strategy\WarehouseItemLocatorStrategyInterface;

class WarehouseItemLocator implements WarehouseItemLocatorInterface
{
    public function __construct(
        private WarehouseItemLocatorStrategyInterface $locatorStrategy,
    ) {
    }

    public function locateProduct(ProductId $productId, int $expectedQuantity): array
    {
        return $this->locatorStrategy->locateProduct($productId, $expectedQuantity);
    }
}
