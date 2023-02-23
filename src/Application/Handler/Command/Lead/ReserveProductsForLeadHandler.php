<?php

declare(strict_types=1);

namespace App\Application\Handler\Command\Lead;

use App\Application\UseCase\Command\Lead\ReserveProductsForLeadCommand;
use App\Domain\Lead\LeadId;
use App\Domain\Lead\LeadRepositoryInterface;
use App\Domain\Lead\LeadWithReservedProducts\ReservedProduct;
use App\Domain\Lead\LeadWithReservedProducts\ReservedProductsList;
use App\Domain\Lead\NewLead\NewLead;
use App\Domain\WarehouseItem\WarehouseItemLocator\WarehouseItemLocatorInterface;
use App\Domain\WarehouseItem\WarehouseItemRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class ReserveProductsForLeadHandler
{
    public function __construct(
        private readonly LeadRepositoryInterface $leadRepository,
        private readonly WarehouseItemRepositoryInterface $warehouseItemRepository,
        private readonly WarehouseItemLocatorInterface $productLocator,
    ) {
    }

    #[AsMessageHandler]
    public function __invoke(ReserveProductsForLeadCommand $command): void
    {
        $lead = $this->leadRepository->getById(new LeadId($command->leadId));
        if (!$lead instanceof NewLead) {
            throw new \RuntimeException('Can not reserve products for that lead.');
        }

        $reservedProducts = new ReservedProductsList([]);
        foreach ($lead->itemsList() as $leadItem) {
            $locatedProducts = $this->productLocator->locateProduct($leadItem->productId(), $leadItem->quantity());

            foreach ($locatedProducts as $locatedProduct) {
                $warehouseItem = $this->warehouseItemRepository->getById($locatedProduct->warehouseItemId());
                $warehouseItem->reserve($lead->id(), $locatedProduct->quantity());
                $this->warehouseItemRepository->save($warehouseItem);

                $reservedProducts->addElement(
                    new ReservedProduct($locatedProduct->warehouseItemId(), $locatedProduct->quantity())
                );
            }
        }

        $lead->reserveProducts($reservedProducts);

        $this->leadRepository->save($lead);
    }
}
