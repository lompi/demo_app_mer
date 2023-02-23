<?php

namespace App\Domain\Product;

use App\Domain\Product\Exception\ProductNotFoundException;

interface ProductRepositoryInterface
{
    public function findById(ProductId $id): ?Product;

    /**
     * @throws ProductNotFoundException
     */
    public function getById(ProductId $id): Product;

    public function getAllProducts(): array;

    public function save(Product $product): void;

    public function remove(Product $product): void;
}
