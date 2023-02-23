<?php

namespace App\Application\UseCase\Command\Lead;

class CreateLeadCommand
{
    public function __construct(
        public string $customerId,
    ) {
    }
}
