<?php

namespace App\Application\UseCase\Command\Cart;

class CreateCartCommand
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
