<?php

declare(strict_types=1);

namespace App\Application\Factory\Lead;

use App\Application\ReadModel\Lead\LeadDetailsReadModel;
use App\Domain\Lead\Lead;
use App\Domain\Lead\LeadLineItem;

class LeadDetailsReadModelFactory
{
    public function __construct(
        private LeadItemReadModelFactory $leadItemReadModelFactory,
    ) {
    }

    public function createFromLead(Lead $lead): LeadDetailsReadModel
    {
        $leadItemsReadModels = array_map(
            fn (LeadLineItem $item) => $this->leadItemReadModelFactory->createFromLeadLineItem($item),
            $lead->items()->toArray(),
        );

        return new LeadDetailsReadModel(
            (string) $lead->id(),
            $leadItemsReadModels
        );
    }
}
