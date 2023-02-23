<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Product\Product;
use App\Domain\Product\ProductId;
use App\Domain\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function findById(ProductId $id): ?Product
    {
        // TODO: Implement findById() method.
    }

    public function getById(ProductId $id): Product
    {
        // TODO: Implement getById() method.
    }

    public function getAllProducts(): array
    {
        // TODO: Implement getAllProducts() method.
    }

    public function save(Product $product): void
    {
        // TODO: Implement save() method.
    }

    public function remove(Product $product): void
    {
        // TODO: Implement remove() method.
    }
}
