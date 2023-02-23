<?php

namespace App\Domain\Order;

use App\Domain\Shared\CollectionOfObjects;

/**
 * @method \Iterator|OrderLineItem[] getIterator()
 * @method OrderLineItem[]           toArray()
 */
class OrderLineItemsList extends CollectionOfObjects
{
    protected const VALID_ELEMENTS_INSTANCES_OF = [
        OrderLineItem::class,
    ];
}
