<?php

namespace App\Domain\WarehouseItem\WarehouseItemLocator\Strategy;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\WarehouseItemLocator\Exception\NotEnoughInShopException;
use App\Domain\WarehouseItem\WarehouseItemLocator\LocatedProduct;
use App\Domain\WarehouseItem\WarehouseItemRepositoryInterface;

class ByWarehousePriorityStrategy implements WarehouseItemLocatorStrategyInterface
{
    public function __construct(
        private readonly WarehouseItemRepositoryInterface $warehouseItemRepository,
    ) {
    }

    public function locateProduct(ProductId $productId, int $expectedQuantity): array
    {
        $warehousesItems = $this->warehouseItemRepository->getWarehouseItemsWithProductSortedByWarehousePriority($productId);
        $result = [];
        $quantityToLocate = $expectedQuantity;
        foreach ($warehousesItems as $warehousesItem) {
            $quantityFromSpecificWarehouse = min($warehousesItem->availableQuantity(), $quantityToLocate);
            $quantityToLocate -= $quantityFromSpecificWarehouse;
            $result[] = new LocatedProduct(
                $warehousesItem->id(),
                $quantityFromSpecificWarehouse
            );
            if (0 === $quantityToLocate) {
                break;
            }
        }

        if ($quantityToLocate > 0) {
            throw NotEnoughInShopException::create($productId, $expectedQuantity);
        }

        return $result;
    }
}
