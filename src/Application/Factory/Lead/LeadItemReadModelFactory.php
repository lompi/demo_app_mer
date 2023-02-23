<?php

declare(strict_types=1);

namespace App\Application\Factory\Lead;

use App\Application\ReadModel\Lead\LeadItemReadModel;
use App\Domain\Lead\LeadLineItem;

class LeadItemReadModelFactory
{
    public function createFromLeadLineItem(LeadLineItem $leadLineItem): LeadItemReadModel
    {
        return new LeadItemReadModel(
            (string) $leadLineItem->productId(),
            $leadLineItem->quantity(),
        );
    }
}
