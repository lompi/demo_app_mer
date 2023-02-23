<?php

namespace App\Domain\WarehouseItem;

use App\Domain\Lead\LeadId;
use App\Domain\Product\ProductId;
use App\Domain\Warehouse\WarehouseId;
use App\Domain\WarehouseItem\Exception\NotEnoughProductsInWarehouseException;
use App\Domain\WarehouseItem\Exception\WarehouseItemAlreadyReservedForLeadException;
use Webmozart\Assert\Assert;

class WarehouseItem
{
    public function __construct(
        private WarehouseItemId $id,
        private ProductId $productId,
        private WarehouseId $warehouseId,
        private int $quantity,
        private WarehouseItemReservationsList $reservationsList,
    ) {
        Assert::greaterThan(0, $quantity);
    }

    public function id(): WarehouseItemId
    {
        return $this->id;
    }

    public function productId(): ProductId
    {
        return $this->productId;
    }

    public function warehouseId(): WarehouseId
    {
        return $this->warehouseId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function availableQuantity(): int
    {
        return $this->quantity - $this->reservationsList->reservedQuantity();
    }

    /**
     * @throws NotEnoughProductsInWarehouseException
     * @throws WarehouseItemAlreadyReservedForLeadException
     */
    public function reserve(LeadId $leadId, int $quantity): void
    {
        if ($this->reservationsList->existsReservationForLead($leadId)) {
            throw WarehouseItemAlreadyReservedForLeadException::byLeadId($leadId);
        }
        if ($this->availableQuantity() < $quantity) {
            throw NotEnoughProductsInWarehouseException::create($this->warehouseId, $this->productId, $quantity);
        }

        $this->reservationsList->addElement(
            new WarehouseItemReservation($this->id, $leadId, $quantity)
        );
    }
}
