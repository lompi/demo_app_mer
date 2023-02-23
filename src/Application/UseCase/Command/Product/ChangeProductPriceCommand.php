<?php

namespace App\Application\UseCase\Command\Product;

class ChangeProductPriceCommand
{
    public string $id;
    public int $newPriceAmount;
    public string $newPriceCurrency;

    public function __construct(string $id, int $newPriceAmount, string $newPriceCurrency)
    {
        $this->id = $id;
        $this->newPriceAmount = $newPriceAmount;
        $this->newPriceCurrency = $newPriceCurrency;
    }
}
