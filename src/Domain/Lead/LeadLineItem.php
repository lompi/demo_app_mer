<?php

namespace App\Domain\Lead;

use App\Domain\Product\ProductId;
use Webmozart\Assert\Assert;

class LeadLineItem
{
    public function __construct(
        private ProductId $productId,
        private int $quantity,
    ) {
        Assert::greaterThan(0, $this->quantity);
    }

    public function productId(): ProductId
    {
        return $this->productId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }
}
