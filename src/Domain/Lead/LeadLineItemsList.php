<?php

namespace App\Domain\Lead;

use App\Domain\Lead\Exception\LeadLineItemForSpecificProductAlreadyExistsException;
use App\Domain\Product\ProductId;
use App\Domain\Shared\CollectionOfObjects;

/**
 * @method \Iterator|LeadLineItem[] getIterator()
 * @method LeadLineItem[]           toArray()
 */
class LeadLineItemsList extends CollectionOfObjects
{
    protected const VALID_ELEMENTS_INSTANCES_OF = [
        LeadLineItem::class,
    ];

    /**
     * @param LeadLineItem $item
     *
     *@throws LeadLineItemForSpecificProductAlreadyExistsException
     */
    public function addElement($item): void
    {
        if ($this->isExistsOnListLineItemForProduct($item->productId())) {
            throw LeadLineItemForSpecificProductAlreadyExistsException::create($item->productId());
        }

        parent::addElement($item);
    }

    private function isExistsOnListLineItemForProduct(ProductId $productId): bool
    {
        foreach ($this->items as $item) {
            /** @var LeadLineItem $item */
            if ($item->productId() === $productId) {
                return true;
            }
        }

        return false;
    }
}
