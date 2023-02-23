<?php

declare(strict_types=1);

namespace App\Domain\Product;

class Product
{
    public function __construct(
        private ProductId $id,
    ) {
    }

    public function id(): ProductId
    {
        return $this->id;
    }
}
