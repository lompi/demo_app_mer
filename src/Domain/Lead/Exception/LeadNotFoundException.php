<?php

declare(strict_types=1);

namespace App\Domain\Lead\Exception;

use App\Domain\Lead\LeadId;
use App\Domain\Shared\Exception\NotFoundException;

class LeadNotFoundException extends NotFoundException
{
    public static function byId(LeadId $leadId): self
    {
        return new self("Not found lead with id `{$leadId}`.");
    }
}
