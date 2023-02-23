<?php

declare(strict_types=1);

namespace App\Domain\Lead\Exception;

use App\Domain\Product\ProductId;

class LeadLineItemForSpecificProductAlreadyExistsException extends \Exception
{
    public static function create(ProductId $productId): self
    {
        return new self("Line item for product {$productId} already exists in list.");
    }
}
