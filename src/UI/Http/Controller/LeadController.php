<?php

namespace App\UI\Http\Controller;

use App\Application\ReadModel\Lead\LeadDetailsReadModel;
use App\Application\UseCase\Command\Lead\CreateLeadCommand;
use App\Application\UseCase\Query\GetLeadDetailsQuery;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class LeadController extends AbstractFOSRestController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Rest\Post("/leads")
     */
    public function create(Request $request): View
    {
        $this->handle(
            new CreateLeadCommand(
                $request->get('id'),
            )
        );

        return $this->view();
    }

    /**
     * @Rest\Get("/leads/{id}")
     */
    public function details(string $id): View
    {
        /** @var LeadDetailsReadModel $cartDetails */
        $cartDetails = $this->handle(new GetLeadDetailsQuery($id));

        return $this->view($cartDetails);
    }
}
