<?php

namespace App\Application\UseCase\Command\Lead;

class ReserveProductsForLeadCommand
{
    public function __construct(
        public string $leadId,
    ) {
    }
}
