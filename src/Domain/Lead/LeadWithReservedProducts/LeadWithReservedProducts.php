<?php

namespace App\Domain\Lead\LeadWithReservedProducts;

use App\Domain\Customer\CustomerId;
use App\Domain\Lead\Lead;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadStatus;
use App\Domain\Order\Order;
use App\Domain\Order\OrderId;
use App\Domain\Order\OrderLineItem;
use App\Domain\Order\OrderLineItemsList;

class LeadWithReservedProducts implements Lead
{
    private LeadStatus $status;

    public function __construct(
        private LeadId $id,
        private CustomerId $customerId,
        private ReservedProductsList $reservedProductsList,
    ) {
        $this->status = LeadStatus::ReservedProducts;
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

    public function reservedProductsList(): ReservedProductsList
    {
        return $this->reservedProductsList;
    }

    public function order(): Order
    {
        $orderLineItems = new OrderLineItemsList([]);
        foreach ($this->reservedProductsList as $reservedProduct) {
            $orderLineItems->addElement(
                OrderLineItem::createFromReservedProduct($reservedProduct)
            );
        }

        return new Order(
            OrderId::generate(),
            $orderLineItems,
        );
    }
}
