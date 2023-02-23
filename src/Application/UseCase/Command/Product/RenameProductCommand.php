<?php

namespace App\Application\UseCase\Command\Product;

class RenameProductCommand
{
    public string $id;
    public string $newName;

    public function __construct(string $id, string $newName)
    {
        $this->id = $id;
        $this->newName = $newName;
    }
}
