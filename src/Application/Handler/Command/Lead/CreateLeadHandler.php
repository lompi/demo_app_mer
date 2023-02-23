<?php

declare(strict_types=1);

namespace App\Application\Handler\Command\Lead;

use App\Application\UseCase\Command\Lead\CreateLeadCommand;
use App\Domain\Customer\CustomerId;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadLineItemsList;
use App\Domain\Lead\LeadRepositoryInterface;
use App\Domain\Lead\NewLead\NewLead;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class CreateLeadHandler
{
    public function __construct(
        private LeadRepositoryInterface $leadRepository,
    ) {
    }

    #[AsMessageHandler]
    public function __invoke(CreateLeadCommand $command): void
    {
        $lead = new NewLead(
            LeadId::generate(),
            new CustomerId($command->customerId),
            new LeadLineItemsList([]),
        );

        $this->leadRepository->save($lead);
    }
}
