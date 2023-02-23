<?php

declare(strict_types=1);

namespace App\UI\Http\Controller;

use FOS\RestBundle\View\View;
use Knp\Component\Pager\Pagination\PaginationInterface;

trait PaginationMetadataTrait
{
    private function paginationView(PaginationInterface $paginator): View
    {
        return View::create([
            'metadata' => [
                'page' => $paginator->getCurrentPageNumber(),
                'per_page' => $paginator->getItemNumberPerPage(),
                'total_count' => $paginator->getTotalItemCount(),
            ],
            'data' => $paginator->getItems(),
        ]);
    }
}
