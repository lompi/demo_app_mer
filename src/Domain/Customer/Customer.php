<?php

namespace App\Domain\Customer;

class Customer
{
    public function __construct(
        private CustomerId $id,
    ) {
    }

    public function id(): CustomerId
    {
        return $this->id;
    }
}
