<?php

namespace App\Domain\Lead;

use App\Domain\Customer\CustomerId;

interface Lead
{
    public function id(): LeadId;

    public function status(): LeadStatus;

    public function customerId(): CustomerId;
}
