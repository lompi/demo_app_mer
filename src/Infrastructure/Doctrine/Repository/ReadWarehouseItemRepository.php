<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Product\ProductId;
use App\Domain\WarehouseItem\WarehouseItem;
use App\Domain\WarehouseItem\WarehouseItemId;
use App\Domain\WarehouseItem\WarehouseItemRepositoryInterface;

// Implementacja repozytorium operujące na osobnej read replice bazy danych
class ReadWarehouseItemRepository implements WarehouseItemRepositoryInterface
{
    public function getById(WarehouseItemId $id): WarehouseItem
    {
        // TODO: Implement getById() method.
    }

    public function getWarehouseItemsWithProductSortedByWarehousePriority(ProductId $productId): iterable
    {
        // TODO: Implement getWarehouseItemsWithProductSortedByWarehousePriority() method.
    }

    public function save(WarehouseItem $WarehouseItem): void
    {
        // TODO: Implement save() method.
    }

    public function remove(WarehouseItem $WarehouseItem): void
    {
        // TODO: Implement remove() method.
    }
}
