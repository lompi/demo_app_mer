<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Lead\Lead;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadRepositoryInterface;

class LeadRepository implements LeadRepositoryInterface
{
    public function getById(LeadId $id): Lead
    {
        // TODO: Implement getById() method.
    }

    public function save(Lead $lead): void
    {
        // TODO: Implement save() method.
    }

    public function remove(Lead $lead): void
    {
        // TODO: Implement remove() method.
    }
}
