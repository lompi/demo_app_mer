<?php

declare(strict_types=1);

namespace App\Domain\Product\Exception;

use App\Domain\Product\ProductId;
use App\Domain\Shared\Exception\NotFoundException;

class ProductNotFoundException extends NotFoundException
{
    public static function byId(ProductId $productId): self
    {
        return new self("Not found product with id `{$productId}`.");
    }
}
