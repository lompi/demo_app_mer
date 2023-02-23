<?php

declare(strict_types=1);

namespace App\Application\UseCase\Query;

class GetLeadDetailsQuery
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
