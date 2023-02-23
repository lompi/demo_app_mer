<?php

declare(strict_types=1);

namespace App\Application\Handler\Command\Lead;

use App\Application\UseCase\Command\Lead\UpsertProductInLeadCommand;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadRepositoryInterface;
use App\Domain\Lead\NewLead\NewLead;
use App\Domain\Product\ProductId;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class UpsertProductInLeadHandler
{
    public function __construct(
        private LeadRepositoryInterface $leadRepository,
    ) {
    }

    #[AsMessageHandler]
    public function __invoke(UpsertProductInLeadCommand $command): void
    {
        $lead = $this->leadRepository->getById(new LeadId($command->leadId));
        if (!$lead instanceof NewLead) {
            throw new \RuntimeException('Items of that lead can no longer be modified.');
        }

        $lead->upsetLineItemForProduct(new ProductId($command->productId), $command->quantity);

        $this->leadRepository->save($lead);
    }
}
