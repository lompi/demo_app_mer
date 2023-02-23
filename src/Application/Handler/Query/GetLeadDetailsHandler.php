<?php

declare(strict_types=1);

namespace App\Application\Handler\Query;

use App\Application\Factory\Lead\LeadDetailsReadModelFactory;
use App\Application\ReadModel\Lead\LeadDetailsReadModel;
use App\Application\UseCase\Query\GetLeadDetailsQuery;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class GetLeadDetailsHandler
{
    private LeadDetailsReadModelFactory $readModelFactory;
    private LeadRepositoryInterface $leadRepository;

    public function __construct(
        LeadDetailsReadModelFactory $readModelFactory,
        LeadRepositoryInterface $leadRepository
    ) {
        $this->readModelFactory = $readModelFactory;
        $this->leadRepository = $leadRepository;
    }

    #[AsMessageHandler]
    public function __invoke(GetLeadDetailsQuery $query): LeadDetailsReadModel
    {
        $leadId = new LeadId($query->id);
        $cart = $this->leadRepository->getById($leadId);

        return $this->readModelFactory->createFromLead($cart);
    }
}
