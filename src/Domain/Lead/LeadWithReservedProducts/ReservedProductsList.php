<?php

namespace App\Domain\Lead\LeadWithReservedProducts;

use App\Domain\Shared\CollectionOfObjects;

/**
 * @method \Iterator|ReservedProduct[] getIterator()
 * @method ReservedProduct[]           toArray()
 */
class ReservedProductsList extends CollectionOfObjects
{
    protected const VALID_ELEMENTS_INSTANCES_OF = [
        ReservedProduct::class,
    ];
}
