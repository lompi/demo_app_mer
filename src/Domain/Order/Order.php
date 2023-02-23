<?php

namespace App\Domain\Order;

class Order
{
    public function __construct(
        private OrderId $id,
        private OrderLineItemsList $itemsList,
    ) {
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function itemsList(): OrderLineItemsList
    {
        return $this->itemsList;
    }
}
