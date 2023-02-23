<?php

declare(strict_types=1);

namespace App\Domain\WarehouseItem\Exception;

use App\Domain\Lead\LeadId;
use App\Domain\Shared\Exception\NotFoundException;

class WarehouseItemAlreadyReservedForLeadException extends NotFoundException
{
    public static function byLeadId(LeadId $leadId): self
    {
        return new self("Warehouse item already reserved for lead with id `{$leadId}`.");
    }
}
