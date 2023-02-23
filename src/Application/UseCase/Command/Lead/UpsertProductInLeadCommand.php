<?php

namespace App\Application\UseCase\Command\Lead;

class UpsertProductInLeadCommand
{
    public function __construct(
        public string $leadId,
        public string $productId,
        public int $quantity
    ) {
    }
}
