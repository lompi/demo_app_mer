<?php

namespace App\Domain\Lead\NewLead;

use App\Domain\Customer\CustomerId;
use App\Domain\Lead\Lead;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadLineItem;
use App\Domain\Lead\LeadLineItemsList;
use App\Domain\Lead\LeadStatus;
use App\Domain\Lead\LeadWithReservedProducts\LeadWithReservedProducts;
use App\Domain\Lead\LeadWithReservedProducts\ReservedProductsList;
use App\Domain\Product\ProductId;

class NewLead implements Lead
{
    private LeadStatus $status;

    public function __construct(
        private LeadId $id,
        private CustomerId $customerId,
        private LeadLineItemsList $itemsList
    ) {
        $this->status = LeadStatus::New;
    }

    public function id(): LeadId
    {
        return $this->id;
    }

    public function status(): LeadStatus
    {
        return $this->status;
    }

    public function customerId(): CustomerId
    {
        return $this->customerId;
    }

    public function itemsList(): LeadLineItemsList
    {
        return $this->itemsList;
    }

    public function upsetLineItemForProduct(ProductId $productId, int $quantity): void
    {
        foreach ($this->itemsList as $item) {
            /** @var LeadLineItem $item */
            if ($item->productId() === $productId) {
                $this->itemsList->removeElement($item);
                break;
            }
        }

        $this->itemsList->addElement(
            new LeadLineItem($productId, $quantity)
        );
    }

    public function reserveProducts(ReservedProductsList $reservedProducts): LeadWithReservedProducts
    {
        return new LeadWithReservedProducts(
            $this->id,
            $this->customerId,
            $reservedProducts,
        );
    }
}
