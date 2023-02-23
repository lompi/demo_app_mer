<?php

namespace App\Domain\Lead;

use App\Domain\Lead\Exception\LeadNotFoundException;

interface LeadRepositoryInterface
{
    /**
     * @throws LeadNotFoundException
     */
    public function getById(LeadId $id): Lead;

    public function save(Lead $lead): void;

    public function remove(Lead $lead): void;
}
