<?php

namespace App\Domain\WarehouseItem;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\Exception\WarehouseItemNotFoundException;

interface WarehouseItemRepositoryInterface
{
    /**
     * @throws WarehouseItemNotFoundException
     */
    public function getById(WarehouseItemId $id): WarehouseItem;

    /**
     * @return WarehouseItem[]
     */
    public function getWarehouseItemsWithProductSortedByWarehousePriority(ProductId $productId): iterable;

    public function save(WarehouseItem $WarehouseItem): void;

    public function remove(WarehouseItem $WarehouseItem): void;
}
