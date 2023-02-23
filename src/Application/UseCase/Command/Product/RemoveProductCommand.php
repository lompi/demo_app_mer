<?php

namespace App\Application\UseCase\Command\Product;

class RemoveProductCommand
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
