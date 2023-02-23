<?php

namespace App\Domain\WarehouseItem;

use App\Domain\Lead\LeadId;
use App\Domain\Shared\CollectionOfObjects;

class WarehouseItemReservationsList extends CollectionOfObjects
{
    protected const VALID_ELEMENTS_INSTANCES_OF = [
        WarehouseItemReservation::class,
    ];

    public function existsReservationForLead(LeadId $leadId): bool
    {
        foreach ($this->items as $item) {
            /** @var WarehouseItemReservation $item */
            if ($item->reservedFor() === $leadId) {
                return true;
            }
        }

        return false;
    }

    public function reservedQuantity(): int
    {
        $quantity = 0;
        foreach ($this->items as $item) {
            /* @var WarehouseItemReservation $item */
            $quantity += $item->quantity();
        }

        return $quantity;
    }
}
